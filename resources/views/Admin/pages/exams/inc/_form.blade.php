@csrf

<div class="row col-md-12">

    <div class="col-md-6 m-auto">
        <label for="price" class="form-label">{{__('exams.name')}}</label>
        <input type="text" class="form-control my-2" id="name" name="name"
               value="{{old('name', isset($exam) ? $exam->name : null)}}"
               placeholder="{{__('exams.enter_exam_name')}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="type" class="form-label">{{__('exams.exam_type')}}</label>
        <select name="exam_type" id="type" class="form-control">
            <option value="">{{__('exams.select_exam_type')}}</option>
            <option value="True&False"
                {{ old('exam_type', isset($exam) ? $exam->exam_type : null) == 'True&False' ? 'selected' : '' }}
            >{{__('exams.select_exam_type_true_false')}}
            </option>
            <option value="Choices"
                {{ old('exam_type', isset($exam) ? $exam->exam_type : null) == 'Choices' ? 'selected' : '' }}
            >{{__('exams.select_exam_type_choices')}}
            </option>
            <option value="Asiyes"
                {{ old('exam_type', isset($exam) ? $exam->exam_type : null) == 'Asiyes' ? 'selected' : '' }}
            >{{__('exams.select_exam_type_asiyes')}}
            </option>
        </select>
        @error('exam_type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="start_time" class="form-label">{{__('exams.exam_start_data')}}</label>
        <input type="text" class="form-control flatpickr flatpickr-input active"
               id="dateTimeFlatpickr_start_data" name="start"
               value="{{old('start', isset($exam) ? $exam->start : null)}}"
               placeholder="{{__('exams.exam_start_data')}}">
        @error('start')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="end_data" class="form-label">{{__('exams.exam_end_data')}}</label>
        <input type="datetime-local" class="form-control my-2" id="dateTimeFlatpickr_end_data" name="end"
               value="{{old('end', isset($exam) ? $exam->end : null)}}"
               placeholder="{{__('exams.exam_end_data')}}">
        @error('end')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="time" class="form-label">{{__('exams.exam_time')}}</label>
        <input type="text" class="form-control my-2" id="time" name="time"
               value="{{old('time', isset($exam) ? $exam->time : null)}}"
               placeholder="{{__('exams.exam_time')}}">
        @error('time')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="degree" class="form-label">{{__('exams.exam_degree')}}</label>
        <input type="number" class="form-control my-2" id="degree" name="degree"
               value="{{old('degree', isset($exam) ? $exam->degree : null)}}"
               placeholder="{{__('exams.exam_degree')}}">
        @error('degree')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="active" class="form-label">{{__('exams.exam_active')}}</label>
        <select name="active" id="active" class="form-control">
            <option value="">{{__('exams.select_exam_active_or_not')}}</option>
            <option value="1"
                {{ old('active', isset($exam) ? $exam->active : null) == '1' ? 'selected' : '' }}
            >{{__('exams.select_exam_active')}}
            </option>
            <option value="0"
                {{ old('active', isset($exam) ? $exam->active : null) == '0' ? 'selected' : '' }}
            >{{__('exams.select_exam_not_active')}}
            </option>
        </select>
        @error('active')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="closed" class="form-label">{{__('exams.exam_closed')}}</label>
        <select name="close" id="closed" class="form-control">
            <option value="">{{__('exams.select_exam_closed_or_not')}}</option>
            <option value="0"
                {{ old('close', isset($exam) ? $exam->close : null) == '0' ? 'selected' : '' }}
            >{{__('exams.select_exam_closed')}}
            </option>
            <option value="1"
                {{ old('close', isset($exam) ? $exam->close : null) == '1' ? 'selected' : '' }}
            >{{__('exams.select_exam_not_closed')}}
            </option>
        </select>
        @error('close')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="auto_answer" class="form-label">{{__('exams.exam_auto_answer')}}</label>
        <select name="auto_answer" id="auto_answer" class="form-control">
            <option value="">{{__('exams.select_exam_auto_answer_or_not')}}</option>
            <option value="1"
                {{ old('auto_answer', isset($exam) ? $exam->auto_answer : null) == '1' ? 'selected' : '' }}
            >{{__('exams.select_exam_auto_answer')}}
            </option>
            <option value="0"
                {{ old('auto_answer', isset($exam) ? $exam->auto_answer : null) == '0' ? 'selected' : '' }}
            >{{__('exams.select_exam_not_auto_answer')}}
            </option>
        </select>
        @error('auto_answer')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 m-auto">
        <label for="limit_questions" class="form-label">{{__('exams.exam_question_limit')}}</label>
        <input type="number" class="form-control my-2" id="limit_questions" name="limit_questions"
               value="{{old('limit_questions', isset($exam) ? $exam->limit_questions : null)}}"
               placeholder="{{__('exams.enter_limit_questions')}}">
        @error('limit_questions')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>

