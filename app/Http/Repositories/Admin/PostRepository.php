<?php

namespace App\Http\Repositories\Admin;

use App\Events\PostView;
use App\Http\Services\LocalizationService;
use App\Http\Traits\Admin\BlogCategoryTrait;
use App\Http\Traits\ImageTrait;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use function exec;
use function shell_exec;

class PostRepository implements \App\Http\Interfaces\Admin\PostInterface
{
    use BlogCategoryTrait;
    use ImageTrait;

    private $postModel, $blogCategoryModel;

    public function __construct(Post $post, BlogCategory $blogCategory)
    {
        $this->postModel = $post;
        $this->blogCategoryModel = $blogCategory;
    }

    public function index($datatable)
    {
        return $datatable->render('Admin.pages.blog.posts.index');
    }

    public function create()
    {
        $blog_categories = $this->getBlogCategories();
        return view('Admin.pages.blog.posts.create',compact('blog_categories'));
    }

    public function store($request)
    {

        $data = LocalizationService::getLocalizationDataAsArray($this->postModel::$translatableData, $request);
        $imageName = $this->uploadImage($request->image ,$this->postModel::PATH);
        $this->postModel::create(array_merge($data,[
            'category_id' => $request->category_id,
            'image'=> $imageName,
            'admin_id' => Auth::id(),
        ]));
        toast(__("posts.store"),'success');
        return redirect(route('admin.posts.index'));
    }

    public function edit($post)
    {
        $blog_categories = $this->getBlogCategories();
        return view('Admin.pages.blog.posts.edit',compact('post' , 'blog_categories'));

    }

    public function update($request, $post)
    {
        if ($request->image) {

            $imageName = $this->uploadImage($request->image, $this->postModel::PATH, $post->getRawOriginal('image'));
        }
        $data = LocalizationService::getLocalizationDataAsArray($this->postModel::$translatableData, $request);
        $post->update(array_merge($data , [
            'category_id' => $request->category_id,
            'image' => $imageName ?? $post->getRawOriginal('image'),
        ]));

        toast(__("posts.update"),'success');
        return redirect(route('admin.posts.index'));
    }

    public function show($post)
    {
        // event(new PostView($post, request()->ip())); api
        return view('Admin.pages.blog.posts.show',compact('post'));
    }

    public function delete($post)
    {
       $post->delete();
       $this->removeImage($post->image);
        toast(__("posts.delete"),'success');
       return back();
    }


    public function update_status($comment)
    {
        if($comment->status == 0){
            $comment->update([
                'status'=> 1
            ]);
            toast(__("posts.rejected_status"),'success');
        }elseif ($comment->status == 1){
            $comment->update([
                'status'=> 0
            ]);
            toast(__("posts.approved_status"),'success');
        }
        return back();
    }
}
