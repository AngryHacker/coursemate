<?php
/* @var $this StudentController */
/* @var $model Student */

?>

<div class='container' style='margin-top:20px;'>
    <div class='row'>
<table class='table table-striped'>
    <th colspan='2' style='font-size:15px;font-weight:650;'><center><?php echo $self?'我的资料':'Ta 的资料'; ?></center></th>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户名</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->username;?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>昵称</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->nickname?$model->nickname:'无名氏';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>性别</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->sex==1?'男':'女';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>年级</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->grade;?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>学院</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $self?$model->school:'你猜';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>专业</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $self?$model->major:'你再猜';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>学号</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $self?$model->number:'怎么会告诉你';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>签名</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->signature?$model->signature:"无";?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>邮箱</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->email?$model->email:'无';?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户积分</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->score;?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户等级</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo Yii::app()->params['rank'][$model->rank];?></p></td>
    </tr>
    <tr>
    <td class='col-xs-6'><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>最近登录</p></td>
    <td class='col-xs-6'><p style='text-align:left;margin:10px;font-size:14px;'><?php echo date('Y-m-d H:i:s',$model->login_time);?></p></td>
    </tr>

<?php

if($self)
{
    echo "<tr><td colspan='2'><a class='btn btn-lg btn-block btn-warning' href='?r=student/update&id={$model->user_id}'>更新资料</a></td></tr>";
}
?>

</table>

    </div>
</div>
