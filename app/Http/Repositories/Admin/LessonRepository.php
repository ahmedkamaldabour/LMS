<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\LessonInterface;
use App\Http\Services\LocalizationService;
use App\Http\Traits\Admin\CourseTrait;
use App\Http\Traits\FileTrait;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;


class LessonRepository implements LessonInterface
{
    use CourseTrait, FileTrait,
        hasTranslations;

    private $lessonModel;

    public function __construct(Lesson $lessonModel)
    {
        $this->lessonModel = $lessonModel;
    }

    public function index($dataTable)
    {
        return $dataTable->render('Admin.pages.lessons.index');

    }

    public function store($request)
    {

        $type = $request->input('type');
        $title_lang = LocalizationService::getLocalizationDataAsArray(Lesson::$translatableData, $request)['title'];
        $LangFields = LocalizationService::getLocalizationAttributeWith_Lang(Lesson::$translatableData);

        // dd($request->all());
        $data = $request->except(array_merge($LangFields, ['_token', 'body']));
        $data['title'] = $title_lang;


        if ($type == "video" && $request->hasFile('video')) {
            $fileName = $this->uploadFile($request->file('video'), Lesson::PATH);
            $data['body'] = $fileName;
        } else if ($type == "file" && $request->hasFile('file')) {
            $fileName = $this->uploadFile($request->file('file'), Lesson::PATH);
            $data['body'] = $fileName;
        } else if ($type == "text") {
            $text_lang = LocalizationService::getLocalizationDataAsArray(Lesson::$translatableData, $request)['text'];
            $data['body'] = $text_lang;
        }

        $body_data = $data['body'];

        //create without translation if type is file or video
        if ($type == 'text') {
            $lesson = $this->lessonModel->create($data);
        } else {
            db::beginTransaction();
            try {
                $lesson = $this->lessonModel->create($data);
                $lesson->setBodyAttribute($body_data);
                $lesson->save();
                db::commit();
            } catch (\Exception $e) {
                db::rollback();
                throw $e;
            }
        }

        toast('Lesson created successfully', 'success');
        return redirect(route('admin.lessons.index'));

    }

    public function create()
    {
        $courses = $this->getCourses();

        return view('Admin.pages.lessons.create', compact('courses'));
    }

    public function show($lesson)
    {
        // TODO: Implement show() method.
    }

    public function edit($lesson)
    {
        $courses = $this->getCourses();

        return view('Admin.pages.lessons.edit', compact('lesson', 'courses'));
    }

    public function update($request, $lesson)
    {

        $type = $request->input('type');
        $title_lang = LocalizationService::getLocalizationDataAsArray(Lesson::$translatableData, $request)['title'];
        $LangFields = LocalizationService::getLocalizationAttributeWith_Lang(Lesson::$translatableData);
        $data = $request->except(array_merge($LangFields, ['_token', 'body', '_method']));

        $data['title'] = $title_lang;
        if ($type == "video" && $request->hasFile('video')) {
            $fileName = $this->uploadFile($request->file('video'), Lesson::PATH, Lesson::PATH . DIRECTORY_SEPARATOR . $lesson->body);
            $data['body'] = $fileName;
        } else if ($type == "file" && $request->hasFile('file')) {
            $fileName = $this->uploadFile($request->file('file'), Lesson::PATH, Lesson::PATH . DIRECTORY_SEPARATOR . $lesson->body);
            $data['body'] = $fileName;
        } else if ($type == "text") {
            if ($lesson->type == "video" || $lesson->type == "file") {
                $this->removeFile(Lesson::PATH . DIRECTORY_SEPARATOR . $lesson->body);
            }
            $text_lang = LocalizationService::getLocalizationDataAsArray(Lesson::$translatableData, $request)['text'];
            $data['body'] = $text_lang;
        }


        //update without translation if type is file or video
;
        if ($type == 'text') {
            $lesson->update($data);
        } else {
            $lesson->update($data);
            $lesson->setBodyAttribute($data['body'] ?? $lesson->getOriginal('body'));
            $lesson->save();
        }


        toast('Lesson updated successfully', 'success');
        return redirect(route('admin.lessons.index'));
    }

    public function destroy($lesson)
    {
        if ($lesson->type == "video" || $lesson->type == "file") {
            $this->removeFile(Lesson::PATH . DIRECTORY_SEPARATOR . $lesson->body);
        }
        $lesson->delete();

        toast('Lesson deleted successfully', 'success');
        return redirect(route('admin.lessons.index'));
    }
}
