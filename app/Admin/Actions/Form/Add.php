<?php

namespace App\Admin\Actions\Form;

use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;
use App\Imports\DataExcel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class Add extends Form
{
   

    // 处理请求
    public function handle(array $input)
    {
    	// dd($input);
    	$file = env('APP_URL').'/upload/'.$input['file'];
    
         try {
            Excel::import(new DataExcel(time()), $input['file'],'public');
             return $this->ajaxResponse('ok');
        } catch (ValidationException $validationException) {
            return Response::withException($validationException);
        } catch (Throwable $throwable) {
            $this->response()->status = false;
            // return $this->response()->swal()->error($throwable->getMessage());
            return $this->response()->error('上传失败')->refresh();
        }
    }

    public function form()
    {
    	 $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空']);
        
    }

    // 返回表单数据，如不需要可以删除此方法
  
}