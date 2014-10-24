<?php
/* @var $this StudentController */
/* @var $model Student */

?>

<ul data-role='listview'>
<li data-role="list-divider"><center><h2><?php echo $self?'我的资料':'Ta 的资料'; ?></h2></center></li>
<div class="ui-grid-a">
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户名</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->username;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>昵称</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->nickname;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>性别</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->sex==1?'男':'女';?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>年级</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->grade;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>学院</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->school;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>专业</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->major;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>学号</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->number;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>签名</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->signature?$model->signature:"无";?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>邮箱</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->email;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户积分</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->score;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>用户等级</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo $model->rank;?></p></div>
    <div class="ui-block-a"><p style='text-align:right;margin:10px;font-size:14px;font-weight:700;'>最近登录</p></div>
    <div class="ui-block-b"><p style='text-align:left;margin:10px;font-size:14px;'><?php echo date('Y-m-d H:i:s',$model->login_time);?></p></div>
</div>

<?php

if($self)
{
    echo "<a data-role='button' href='?r=student/update&id={$model->user_id}'>更新资料</a>";
}
?>

</ul>
