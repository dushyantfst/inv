<?php
/* @var $this yii\web\View */
use yii\web\View;
$this->title = 'Task View';
?>
<div class="site-index">

    <div class="body-content">

        <div class="col-lg-12">
            <section class="col-md-4">
                <div class="panel panel-danger ">
                    <div class="panel-heading">
                        <div class='new-item-header'>
                            <span id="newHeading">Not Started</span>

                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" id='newList'></ul>
                    </div>
                </div>
            </section>
            <section class="col-md-4">
                <div class="panel panel-warning ">
                    <div class="panel-heading">
                        In Progress
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" id="currentList"></ul>
                    </div>
                </div>
            </section>
<!--            <section class="col-md-4">
                <div class="panel panel-success ">
                    <div class="panel-heading">
                        Completed
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" id="completedList"></ul>
                    </div>
                </div>
            </section>-->
            <section class="col-md-4">
                <div class="panel panel-success ">
                    <div class="panel-heading">
                        Completed
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" id="archivedList"></ul>
                    </div>
                </div>
            </section>
        </div>


    </div>
</div>


<?php
$script = <<< JS
$(document).ready(function(){
       console.log("----- Go Back Clicked--------" ); 
        html5task.tasks();
    console.log("-----  Co code Clicked--------" );
}); 
JS;
$this->registerJs($script, View::POS_END);
?>