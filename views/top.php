<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>ITS</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .bold {
        font-weight: 900;
    }

    p,
    .url_decode {
        font-size: 0.80rem;
        font-family: Arial, Helvetica, sans-serif;
        padding-bottom: 1rem;

    }

    .url_decode {
        color: #989EBE;
    }

    .url_decode.admin {
        color: #000000;
        padding-bottom: 0;
    }

    form p {
        padding-bottom: 0;
    }

    .top_nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #61697C;
        padding: 0.8rem 1rem;
    }

    .top_nav p {
        color: white;
        font-weight: 700;

    }

    .top_nav button {
        color: #61697C;
        background-color: #fff;
        margin-bottom: 0;
    }

    button {
        appearance: none;
        padding: 0.3rem 0.8rem;
        border-radius: 5px;
        border: 0;
        box-shadow: 1px 1px 5px #61697CAA;
        background-color: #ECEEF4;
        color: #303646;
        font-weight: 900;
        font-size: 0.7rem;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .admin_main,
    .signin,
    .signup {
        padding: 1rem;
    }


    textarea {
        width: 100%;
        height: 3rem;
        border-radius: 5px;
        resize: none;
        margin: 1rem 0;
        padding: 1rem;

    }

    #comment {
        height: 5rem;
    }

    .comment {
        display: flex;
        flex-direction: column;
        box-shadow: 1px 1px 10px #61697C55;
        margin-bottom: 1rem;
        padding: 1rem;
        border-radius: 5px;
        background-color: #61697C55;
        width: 100%;
    }

    .me p,
    .me h4 {
        max-width: 65ch;
        margin-left: auto;
        text-align: right;
    }

    .comment form {
        margin-left: auto;
    }

    .comment button {
        margin-bottom: 0;
    }

    .comment p:nth-child(2) {
        padding: 1rem 0;
    }

    .comment p:nth-child(3) {
        padding-bottom: 1rem;
    }

    .me {
        justify-content: flex-end;
        background-color: #fff;
    }

    .signup,
    .signin {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #ECEEF4;
    }

    .signup_form,
    .login_form {
        display: flex;
        flex-direction: column;
        width: 300px;
        border-radius: 5px;
        box-shadow: 1px 1px 10px #61697C55;
        padding: 2rem;
        background-color: #fff;


    }

    label {
        width: 100%;
        font-size: 0.8rem;
        display: flex;
        justify-content: space-between;
        padding-bottom: 1rem;
        align-items: center;
    }

    label>input {
        align-self: flex-end;
        padding: 0.2rem 0.5rem;
    }

    input::placeholder {
        font-size: 0.8rem;
    }
    </style>
</head>

<body>