<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <H1>The problem</h1>
<p >Brucie&rsquo;s Banana Bazaar is a banana wholesaler. They sell bananas in a variety of pack sizes:</p>
<ul>
<li >250 bananas</li>
<li >500 bananas</li>
<li >1,000 bananas</li>
<li >2,000 bananas</li>
<li >5,000 bananas</li>
</ul>
<p >Their customers can order any number of bananas, but they will always be given complete packs.</p>
<p >The company wants to be able to fulfil all orders according to the following rules:</p>
<ol>
<li >Only whole packs can be sent. Packs cannot be broken open.</li>
<li >Within the constraints of Rule 1 above, send out no more bananas than necessary to fulfil the order.</li>
<li >Within the constraints of Rules 1 &amp; 2 above, send out as few packs as possible to fulfil each order.</li>
</ol>
<H1>Your Task</H1>
<p >Write a web app that will tell ​ Brucie&rsquo;s Banana Bazaar ​ what packs to send out, for any given order size.</p>
<p >Keep your app flexible, so that new packs sizes may be added, or existing pack sizes changed or discarded, at a later date with minimal adjustments to your program.</p>
<p >Use Yii2, OOP PHP, HTML5, CSS3, MySQL, Javascript and any other languages to showcase your skills, for deployment to an online browser ​ based tool.</p>

<H1>Solution</H1>
<p >To install this app you need to use console commands:</p>
<p>
<b>composer install</b>
</p>
<p>
<b>php yii migrate-shipping</b>
</p>

    </div>
</div>
