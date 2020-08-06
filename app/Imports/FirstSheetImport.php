<?php

namespace App\Imports;

use App\Models\Work as DataModel;
use App\Models\Work;
// use App\Admin\Models\Recruitinfo as DataModel;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::
default('none');

class FirstSheetImport implements ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, ToModel
{
    private $round;

    public function __construct(int $round)
    {
        $this->round = $round;
    }

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        // 断数据是否重复
        $user = Work::where('url', '=', $row['视频url'])->first();
        if ($user) {
            // 存在返回 null
            return null;
        }
        // 数据库对应的字段
        return new DataModel([
        	"cyid" => $row['创意ID'],
        	"desc" => $row['广告描述'],
        	"appname" => $row['App名'],
        	"author" => $row['作者名'],
        	"username" => $row['账号名'],
        	"goodsname" => $row['商品名'],
        	"url" => $row['视频url'],
            // 'name' => $row['姓名'],
            // 'gender' => $row['性别'],
            // 'id_card' => $row['身份证号码'],
            // 'age' => $row['年龄'],
            // 'education' => $row['学历/学位'],
            // 'politics' => $row['政治面貌'],
            // 'qualification' => $row['专业技术职务任职资格'],
            // 'undergraduate' => $row['本科专业'],
            // 'graduate' => $row['研究生专业'],
            // 'graduate_school' => $row['研究生毕业院校'],
            // 'job_app' => $row['应聘岗位'],
            // 'contact' => $row['联系电话'],
            // 'status' => $row['是否通过初审'],
            // 'reason' => $row['未通过原因'],
            // 'auditor' => $row['审核人'],
            // 'remarks' => $row['备注'],

        ]);
    }

    public function collection(Collection $rows)
    {
        //
    }

    //批量导入1000条
    public function batchSize(): int
    {
        return 1000;
    }

    //以1000条数据基准切割数据
    public function chunkSize(): int
    {
        return 1000;
    }
}
