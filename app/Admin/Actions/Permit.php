<?php


namespace App\Admin\Actions;

use Illuminate\Support\Facades\DB;
use Throwable;
use Encore\Admin\Admin;

use Encore\Admin\Actions\Action;
use Encore\Admin\Actions\Response;
use Maatwebsite\Excel\Validators\ValidationException;
class Permit extends Action
{
    protected $selector = '.import-template';
    public function handle()
    {
        try {
            $num = request()->only('permit');
            $permit = $num['permit'];

            //查询订单表
            $order = DB::table('order')
                ->where('status','=','1')
                ->get();

//            dd(count($order));
            if (count($order)/30 < 1){
                 $order_count = 1;
            }else{
                 $order_count = count($order)/30 + 1;
            }

//            dd($order_count);
            for ($room = 1; $room <= $order_count; $room++){
//                dd($room);
                if(count($order)/30 < 1){
//                    dd(count($order)/30);
                    for ($seat = 1; $seat <= count($order); $seat++){
                        $Ticket = $permit.$this->onum($room).$this->onum($seat);

                        $this->intosql($Ticket,$order[$seat+1]);
//                        return $Ticket;
                    }
                }else{
//                    dd(count($order)/3);
                    for ($seat = 1; $seat <= 30; $seat++){
                        $Ticket = $permit.$this->onum($room).$this->onum($seat);
                        $index = ($room -1)*30 + $seat -1;
                        if(count($order) > $index){
                            $this->intosql($Ticket,$order[$index]);
                        }
                    }
                }

            }
//            $this->intosql($Ticket,$order);

//            DB::statement("ALTER   TABLE   permit   auto_increment = $permit");

        }
        catch (Throwable $throwable) {
            $this->response()->status = false;
            return $this->response()->swal()->error($throwable->getMessage());
        }

        return $this->response()->success('执行成功')->refresh();
    }
    // 按钮样式
    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default import-template">设置准考证规则</a>
HTML;
    }
    // 上传表单
    public function form()
    {
        $this->text('permit', '准考证起始')->rules('required', ['required' => '不能为空']);
    }
    //给小于10的编号前面加0
    public function onum($num){
        if($num < 10){
            return '0'.$num;
        }else{
            return $num;
        }
    }
    public function intosql($ticket,$order){
//        dd($order);


//        foreach ($order as $key =>$value) {
//
            $permit = DB::table('permit')
                ->where('permit_num','=',$ticket)
                ->first();
            $id_card = DB::table('permit')
                ->where('id_card','=',$order->id_card)
                ->first();
            if ($permit || $id_card){
//                dd(2);
                return false;
            }else{

                $permits = DB::table('permit')
                    ->insert([
                        'permit_num' => $ticket,
                        'name' => $order->name,
                        'id_card' => $order->id_card,
                        'job_app' => $order->job_app,
                        'gender' => $order->gender
                    ]);
                if ($permits){

                }else{
                    dd(0);
                }
            }
//
//        }

    }
}
