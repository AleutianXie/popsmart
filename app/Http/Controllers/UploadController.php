<?php

namespace App\Http\Controllers;

use App\Library\Utils\Uploader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {

        $action = $request->input('action');

        switch ($action) {
            case 'config':
                return new JsonResponse(config('UEditorUpload.upload'));
            break;
            case 'uploadimage':
                $file = $request->file('upfile');
                $url = Uploader::uploadImage($file);
                $pathinfo = pathinfo($url);
                $result = [
                    "state"    => "SUCCESS", //上传状态，上传成功时必须返回"SUCCESS"
                    "url"      => $url, //返回的地址
                    "title"    => $pathinfo['filename'], //新文件名
                    "original" => $file->getClientOriginalName(), //原始文件名
                    "type"     => $pathinfo['extension'], //文件类型
                    "size"     => $file->getClientSize(), //文件大小
                ];
                return new JsonResponse($result);
            break;

            /* 上传涂鸦 */
            case 'uploadscrawl':
            /* 上传视频 */
            case 'uploadvideo':
            /* 上传文件 */
            case 'uploadfile':
                break;

            /* 列出图片 */
            case 'listimage':
                break;
            /* 列出文件 */
            case 'listfile':
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                break;
            default:
                $result = json_encode(array(
                    'state' => '请求地址出错',
                ));
                break;
        }
    }
}
