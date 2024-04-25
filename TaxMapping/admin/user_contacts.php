<?php
include('security.php');
include('user_include/header.php');
include('user_include/navbar.php');
?>

<style>
      body {
        background-color: #f0f0f0; 
        background-image: url('gallery/admin.jpg'); /* Replace 'path/to/your/image.jpg' with your image file path */
        background-size: cover;/* Set the background color of the body */
    }
    .container {
        width: 75%;
        background: #fff;
        border-radius: 6px;
        padding: 20px 60px 30px 40px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .container .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .container .left-side {
        width: 25%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
    }

    .container .left-side::before {
        content: '';
        position: absolute;
        height: 70%;
        width: 2px;
        right: -15px;
        top: 50%;
        transform: translateY(-50%);
        background: #afafb6;
    }

    .container .left-side .details {
        margin: 14px;
        text-align: center;
    }

    .container .left-side .details i {
        font-size: 30px;
        color: green;
        margin-bottom: 10px;
    }

    .container .left-side .details .topic {
        font-size: 18px;
        font-weight: 500;
    }

    .container .left-side .details .text-one,
    .container .left-side .details .text-two {
        font-size: 14px;
        color: #afafb6;
    }

    .container .right-side {
        width: 75%;
        margin-left: 50px;
    }

    .container .right-side .topic-text {
        font-size: 23px;
        font-weight: 600;
        color: green;
    }

    .right-side .input-box {
        height: 50px;
        width: 100%;
        margin: 12px 0;
    }

    .right-side .input-box input,
    .right-side .input-box textarea {
        height: 100%;
        width: 100%;
        border: none;
        outline: none;
        font-size: 16px;
        background: #F0F1F8;
        border-radius: 6px;
        padding: 0 15px;
        resize: none;
    }

    .right-side .message-box {
        min-height: 110px;
    }

    .right-side .input-box textarea {
        padding-top: 6px;
    }

    .right-side .button {
        display: inline-block;
        margin-top: 12px;
    }

    .right-side .button input[type="button"] {
        color: #fff;
        font-size: 18px;
        outline: none;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        background: green;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .button input[type="button"]:hover {
        background: #5029bc;
    }

    @media (max-width: 950px) {
        .container {
            width: 90%;
            padding: 30px 40px 40px 35px;
        }

        .container .content .right-side {
            width: 75%;
            margin-left: 55px;
        }
    }

    @media (max-width: 820px) {
      

        .container .content {
            flex-direction: column-reverse;
        }

        .container .content .left-side {
            width: 100%;
            flex-direction: row;
            margin-top: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .container .content .left-side::before {
            display: none;
        }

        .container .content .right-side {
            width: 100%;
            margin-left: 0;
        }
    }
</style>

<div class="container">
    <div class="content">
        <div class="left-side">
            <div class="address details">
                <i class="fas fa-map-marker-alt"></i>
                <div class="topic">Address</div>
                <div class="text-one">Pototan, Iloilo</div>
            </div>
            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">Email</div>
                <div class="text-one">pototanassessorsoffice@gmail.com</div>
                <br>
            </div>
        </div>

        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>If you have any types of queries related to your land, you can send use a message from here. It is our pleasure to help you. Thank you!</p>
            <form action="https://formsubmit.co/712af0d6bcbd8ed731622fad2ad13d9e" method="POST">
                <div class="input-box">
                    <input type="text" name= "name" required placeholder="Enter Your Name">
                </div>
                <div class="input-box">
                    <input type="email" name= "email" required placeholder="Enter Your Email">
                </div>
                <div class="input-box">
                    <input type="text" name= "subject" required placeholder="Enter Subject">
                </div>
                <div class="input-box message-box">
                    <textarea type="text" name= "msg" required placeholder="Enter Message"></textarea>
                </div>
                <div class="button">
                    <input type="submit" class="btn btn-primary" value="Send Now">
                </div>
            </form>
        </div>
    </div>

<br>
<br>

<br>

<?php
include('user_include/scripts.php');
?>
