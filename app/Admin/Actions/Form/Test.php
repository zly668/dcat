<?php

namespace App\Admin\Actions\Form;

use Dcat\Admin\Actions\Response;
use Dcat\Admin\Form\AbstractTool;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Test extends AbstractTool
{
    /**
     * @return string
     */
	protected $title = 'Title';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        // dump($this->getKey());

        return $this->response()
            ->success('Processed successfully.')
            ->redirect('/');
    }

    /**
     * @return string|void
     */
      public function render()
    {
        $id = "batch-reset-pwd";

     

        return <<<HTML
<span data-toggle="modal" data-target="#{$id}">
   <a href="javascript:void(0)">修改密码</a>
</span>
HTML;
    }

    protected function addScript()
    {
        // 弹窗显示后往隐藏的id表单中写入批量选中的行ID
        Admin::script(
            <<<JS
$('#$id').on('shown.bs.modal', function () {
    // 获取选中的ID数组
    var key = {$this->getSelectedKeysScript()}

    $('#reset-password-id').val(key);
});
JS
        );
    }

    protected function modal($id)
    {
        // 表单
        $form = new ResetPasswordForm();

        // 刷新页面时移除模态窗遮罩层
        // 从 v1.5.0 版本开始可以移除这段 JS 代码
        Admin::script('Dcat.onPjaxComplete(function () {
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
        }, true)');

        Admin::html(
            <<<HTML
<div class="modal fade" id="{$id}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">修改密码</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        {$form->render()}
      </div>
    </div>
  </div>
</div>
HTML
        );
    }
}
