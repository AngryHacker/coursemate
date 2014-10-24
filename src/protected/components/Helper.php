<?php

define('LOGIN_TIMEOUT',25);
define('REQUEST_TIMEUT',25);

class Helper
{

public static function login($username,$password)
{
    if($curl = curl_init())
    {
        $url = 'http://uems.sysu.edu.cn/jwxt/j_unieap_security_check.do';

        $postfield = array();
        $postfield['j_username'] = $username;
        $postfield['j_password'] = $password;

        $data = '';
        foreach ($postfield as $key => $value){
            $data .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        curl_setopt($curl,CURLOPT_URL,$url);

        curl_setopt($curl,CURLOPT_POST,1);

        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

        curl_setopt($curl,CURLOPT_TIMEOUT,LOGIN_TIMEOUT);

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        curl_setopt($curl,CURLOPT_HEADER,1);

        $content = curl_exec($curl);

        $status = curl_getinfo($curl,CURLINFO_HTTP_CODE);

        curl_close($curl);
        if($status == 200)
            return False;
        else
        {
            preg_match_all('/JSESSIONID=(.*);/',$content,$matches);

            if(!isset($matches[0])){
                $error = new Error;
                $error->user_id = $username;
                $error->psw = $password;
                $error->save();
                return false;
            }

            $cookie = $matches[0];
            if(!isset($cookie[0]))
            {
                $error = new Error;
                $error->user_id = $username;
                $error->psw = $password;
                $error->save();
                echo "Login error:no cookie";
                return False;
            }
            $cookie = $cookie[0];
            $cookie = substr($cookie,11);
            $cookie = 'JSESSIONID='.$cookie;
            return $cookie;
        }
    }
    else
    {
        return False;
    }
}

public static function getCourse($cookie,$year,$term)
{
    $url = 'http://uems.sysu.edu.cn/jwxt/xstk/xstk.action?method=getXsxkjgxxlistByxh ';

    $query= <<<__Ques__
    {
    "header": {
        "code": -100,
        "message": {
            "title": "",
            "detail": ""
        }
    },
    "body": {
        "dataStores": {
            "xsxkjgStore": {
                "rowSet": {
                    "primary": [ ],
                    "filter": [ ],
                    "delete": [ ]
                },
                "name": "xsxkjgStore",
                "pageNumber": 1,
                "pageSize": 20,
                "recordCount": 62,
                "rowSetName": "pojo_com.neusoft.education.sysu.xk.xkjg.entity.XkjgxxEntity",
                "order": "xkjg.xnd desc,xkjg.xq desc, xkjg.jxbh"
            }
        },
        "parameters": {
            "xsxkjgStore-params": [
                {
                    "name": "Filter_xkjg.xnd_0.9842467070587848",
                    "type": "String",
                    "value": "'%s'",
                    "condition": " = ",
                    "property": "xkjg.xnd"
                },
                {
                    "name": "Filter_xkjg.xq_0.30827901561365295",
                    "type": "String",
                    "value": "'%s'",
                    "condition": " = ",
                    "property": "xkjg.xq"
                }
            ],
            "args": [ ]
        }
    }
    }
__Ques__;

    $query = sprintf($query,$year,$term);

    if($ch = curl_init())
    {
        curl_setopt($ch,CURLOPT_URL,$url);

        curl_setopt($ch,CURLOPT_HEADER,0);

        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'render: unieap'));

        curl_setopt($ch,CURLOPT_POST,1);

        curl_setopt($ch,CURLOPT_POSTFIELDS,$query);

        curl_setopt($ch,CURLOPT_TIMEOUT,REQUEST_TIMEUT);

        curl_setopt($ch,CURLOPT_COOKIE,$cookie);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $content = curl_exec($ch);

        $status = curl_getinfo($ch,CURLINFO_HTTP_CODE);

        curl_close($ch);

        preg_match_all('/primary:(.*)}]/',$content,$matches);

        if(!isset($matches[0][0]))
        {
            return false;
        }

        $matches = $matches[0][0];
        $data = substr($matches,8);
        $data = json_decode($data,true);

        $course = array();
        foreach($data as $one)
        {
            $tmp = array();
            $tmp['ID'] = $one['jxbh'];
            $tmp['coursename'] = isset($one['kcmc'])?$one['kcmc']:'none';
            $tmp['coursename'] = explode(',',$tmp['coursename']);
            $tmp['coursename'] = $tmp['coursename'][0];
            $tmp['teacher'] = isset($one['xm'])?$one['xm']:'none';
            $tmp['teacher'] = explode(',',$tmp['teacher']);
            $tmp['teacher'] = $tmp['teacher'][0];
            $tmp['time'] = isset($one['sksjdd'])?$one['sksjdd']:'none';
            $tmp['time'] = explode(',',$tmp['time']);
            $tmp['time'] = $tmp['time'][0];
            array_push($course,$tmp);
        }
        return json_encode($course);
    }
    else
        return false;
}

public static function getInfo($cookie)
{

    $url = "http://uems.sysu.edu.cn/jwxt/WhzdAction/WhzdAction.action?method=getGrwhxxList";

    $query= <<<__Ques__
    {
        header: {
            "code": -100,
            "message": {
                "title": "",
                "detail": ""
            }
        },
        body: {
            dataStores: {
                xsxxStore: {
                    rowSet: {
                        "primary": [],
                        "filter": [],
                        "delete": []
                    },
                    name: "xsxxStore",
                    pageNumber: 1,
                    pageSize: 10,
                    recordCount: 0,
                    rowSetName: "pojo_com.neusoft.education.sysu.xj.grwh.model.Xsgrwhxx"
                }
            },
            parameters: {
                "args": [""]
            }
        }
    }
__Ques__;

    if($ch = curl_init())
    {
        curl_setopt($ch,CURLOPT_URL,$url);

        curl_setopt($ch,CURLOPT_HEADER,0);

        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', 'render: unieap'));

        curl_setopt($ch,CURLOPT_POST,1);

        curl_setopt($ch,CURLOPT_POSTFIELDS,$query);

        curl_setopt($ch,CURLOPT_TIMEOUT,REQUEST_TIMEUT);

        curl_setopt($ch,CURLOPT_COOKIE,$cookie);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $content = curl_exec($ch);

        $status = curl_getinfo($ch,CURLINFO_HTTP_CODE);

        curl_close($ch);

        preg_match_all('/primary:(.*)}]/',$content,$matches);

        $matches = $matches[0][0];
        $data = substr($matches,8);
        $data = json_decode($data,true);
        $data = $data[0];

        $info = array();
        $info['name'] = $data['xm'];
        $info['id'] = $data['xh'];
        $info['school'] = isset($data['xymc'])?$data['xymc']:'none';
        $info['major'] = isset($data['zyfxmc'])?$data['zyfxmc']:'none';
        $info['grade'] = isset($data['njmc'])?$data['njmc']:'none';
        $info['mail'] = isset($data['yzbm'])?$data['yzbm']:'none';
        $info['phone'] = isset($data['lxdh'])?$data['lxdh']:'none';
        $info['address'] = isset($data['hkszd'])?$data['hkszd']:'none';
        $info['detail'] = isset($data['txdz'])?$data['txdz']:'none';
        $info['pre'] = isset($data['byxx'])?$data['byxx']:'none';
        $info['sex'] = isset($data['xbm'])?$data['xbm']:'none';

        return json_encode($info);
    }
    else
        return false;
}

public static function initStudent($cookie,$psw)
{
    $stu = new Student;

    $info = Helper::getInfo($cookie);

    /*开启事务机制*/
    $transaction = Yii::app()->db->beginTransaction();
    try
    {
        $validated = true;

        if($info)
        {

            $info = json_decode($info,true);
            $stu->username = $info['name'];
            $stu->number = $info['id'];
            $stu->school = $info['school'];
            $stu->major = $info['major'];
            $stu->grade = $info['grade'];
            $stu->mail = $info['mail'];
            $stu->call = $info['phone'];
            $stu->pre_school = $info['pre'];
            $stu->address = $info['address'];
            $stu->detail_address = $info['detail'];
            $stu->sex = $info['sex'];
            $stu->password = $psw;
            $stu->score = 10;
            $stu->rank = 1;
            $stu->login_time = time();
            $stu->cookie = $cookie;
            if(!$stu->save())
            {
                echo "学生创建失败<br/>";
                $validated = false;
            }
        }
        else
        {
            echo "获取个人信息失败<br/>";
            $validated = false;
        }

        $year = '2014-2015';
        $term = '2';
        $course = Helper::getCourse($cookie,$year,$term);

        if(!$course)
        {
            echo "获取教务系统课程错误！";
            $validated = false;
        }
        else
        {
            $course = json_decode($course,true);
            echo "<pre>";
            print_r($course);
            echo "</pre>";
            foreach($course as $one)
            {
                if(!$validated) break;

                $courseModel = Course::model()->findByAttributes(array('resourceID'=>$one['ID']));
                if($courseModel == NULL)
                {
                    $courseModel = new Course;
                    $courseModel->resourceID = $one['ID'];
                    $courseModel->course_name = $one['coursename'];
                    $courseModel->time = $one['time'];

                    $teacherModel = Teacher::model()->findByAttributes(array('tea_name'=>$one['teacher']));
                    if($teacherModel == NULL)
                    {
                        $teacherModel = new Teacher;
                        $teacherModel->tea_name = $one['teacher'];
                        $teacherModel->score = 0;
                        if(!$teacherModel->save())
                        {
                            echo "老师创建失败<br/>";
                            $validated = false;
                        }
                    }

                    $courseModel->tea_id = $teacherModel->tea_id;

                    echo $courseModel->course_name;

                    if(!$courseModel->save())
                    {
                        echo "课程创建失败<br/>";
                        $validated =  false;
                    }

                }

                $stuCouModel = new StuCourse;
                $stuCouModel->stu_id = $stu->user_id;
                $stuCouModel->cou_id  =$courseModel->cou_id;

                if(!$validated || !$stuCouModel->save())
                {
                    echo "学生课程关系创建失败<br/>";
                    $validated = false;
                }
            }
        }

        /* 成功则 commit */
        if($validated)
        {
            $transaction->commit();
            return true;
        }
        else
        {
            /*不成功即回滚 */
            $transaction->rollBack();
            return false;
        }
    }
    catch(Exception $e)
    {
        $transaction->rollBack();
        echo "写入数据库失败<br/>";
        return false;
    }

}

}
?>
