<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Instameme</title>

    <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css?family=Poppins"
            rel="stylesheet"
    />

    <style>
        .insta-profile-avatar {
            height: 72px !important;
            width: 72px !important;
        }

        @media (min-width: 767px) {
            .insta-profile-avatar {
                height: 146px !important;
                width: 146px !important;

            }
        }
        label, h1, h2, h3, h4, h5, h6, p{
            font-family: "Poppins";
        }
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .instagram-feed {
            width: 35%;
            height: auto;
            background-color: #ffffff;
            margin: 50px auto;
            padding-bottom: 10px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 2px,
            rgba(0, 0, 0, 0.2) 0px 1px 2px;
        }

        @media (max-width: 768px) {
            .instagram-feed {
                width: 100%;
                height: auto;
                background-color: #ffffff;
                margin: 50px auto;
                padding-bottom: 10px;
                box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 2px,
                rgba(0, 0, 0, 0.2) 0px 1px 2px;
            }
        }

        .instagram-feed .instagram-username {
            padding: 10px 30px 0px 30px;
            display: flex;
            flex-flow: row;
        }

        .instagram-feed .instagram-username .instagram-image,
        .instagram-feed .instagram-username .instagram-image img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .instagram-feed .instagram-username a {
            color: #000000;
            font-weight: 400;
            text-decoration: none;
            font-size: 14px;
        }

        .instagram-feed .instagram-username .insta-id {
            margin: 10px 15px;
        }

        .instagram-feed .instagram-post {
            width: 100%;
            height: 100%;
            margin: 10px 0px;
        }

        .instagram-feed .instagram-post img {
            width: 100%;
            height: inherit;
        }

        .instagram-feed .btn-group {
            padding: 0px 10px;
        }

        .instagram-feed .btn-group button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .instagram-feed .btn-group .btn-bookmark {
            float: right;
        }

        .instagram-feed .caption {
            font-size: 13px;
            padding: 0px 20px;
        }

        .instagram-feed .caption .insta-like {
            font-weight: bold;
        }

        .instagram-feed .caption .insta-id {
            color: #000000;
            text-decoration: none;
        }

        .instagram-feed .caption .time {
            font-size: 10px;
            color: #999;
        }

        /*

  All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 310).

  The 'supports' rule will only run if your browser supports CSS grid.

  Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve a similar layout.

  */

        /* Base Styles */

        :root {
            font-size: 0.87em;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Open Sans', Arial, sans-serif;
            min-height: 100vh;
            background-color: #fafafa;
            color: #262626;
            padding-bottom: 3rem;
        }

        img {
            display: block;
        }

        .insta-profile-container {
            max-width: 93.5rem;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .insta-btn {
            display: inline-block;
            font: inherit;
            background: none;
            border: none;
            color: inherit;
            padding: 0;
            cursor: pointer;
        }

        .insta-btn:focus {
            outline: 0.5rem auto #4d90fe;
        }

        .visually-hidden {
            position: absolute !important;
            height: 1px;
            width: 1px;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
        }

        /* Profile Section */

        .profile {
            padding: 5rem 0;
        }

        .profile::after {
            content: '';
            display: block;
            clear: both;
        }

        .profile-image {
            float: left;
            width: calc(33.333% - 1rem);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 3rem;
        }

        .profile-image img {
            border-radius: 50%;
        }

        .profile-user-settings,
        .profile-stats,
        .profile-bio {
            float: left;
            width: calc(66.666% - 2rem);
        }

        .profile-user-settings {
            margin-top: 1.1rem;
        }

        .profile-user-name {
            display: inline-block;
            font-size: 2.2rem;
            font-weight: 300;
        }

        .profile-edit-insta-btn {
            font-size: 1.4rem;
            line-height: 1.8;
            border: 0.1rem solid #dbdbdb;
            border-radius: 0.3rem;
            padding: 0 2.4rem;
            margin-left: 2rem;
        }

        .profile-settings-insta-btn {
            font-size: 2rem;
            margin-left: 1rem;
        }

        .profile-stats {
            margin-top: 2.3rem;
        }

        .profile-stats li {
            display: inline-block;
            font-size: 1.6rem;
            line-height: 1.5;
            margin-right: 4rem;
            cursor: pointer;
        }

        .profile-stats li:last-of-type {
            margin-right: 0;
        }

        .profile-bio {
            font-size: 1.6rem;
            font-weight: 400;
            line-height: 1.5;
            margin-top: 2.3rem;
        }

        .profile-real-name,
        .profile-stat-count,
        .profile-edit-insta-btn {
            font-weight: 600;
        }

        /* Gallery Section */

        .gallery {
            width: auto;
            display: flex;
            flex-wrap: wrap;
            margin: -1rem -1rem;
            padding-bottom: 3rem;
        }

        .gallery-item {
            position: relative;
            flex: 1 0 22rem;
            margin: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .gallery-item:hover .gallery-item-info,
        .gallery-item:focus .gallery-item-info {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .gallery-item-info {
            display: none;
        }

        .gallery-item-info li {
            display: inline-block;
            font-size: 1.7rem;
            font-weight: 600;
        }

        .gallery-item-likes {
            margin-right: 2.2rem;
        }

        .gallery-item-type {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2.5rem;
            text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
        }

        .fa-clone,
        .fa-comment {
            transform: rotateY(180deg);
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Loader */

        .loader {
            width: 5rem;
            height: 5rem;
            border: 0.6rem solid #999;
            border-bottom-color: transparent;
            border-radius: 50%;
            margin: 0 auto;
            animation: loader 500ms linear infinite;
        }

        /* Media Query */

        @media screen and (max-width: 40rem) {
            .profile {
                display: flex;
                flex-wrap: wrap;
                padding: 4rem 0;
            }

            .profile::after {
                display: none;
            }

            .profile-image,
            .profile-user-settings,
            .profile-bio,
            .profile-stats {
                float: none;
                width: auto;
            }

            .profile-image img {
                width: 7.7rem;
            }

            .profile-user-settings {
                flex-basis: calc(100% - 10.7rem);
                display: flex;
                flex-wrap: wrap;
                margin-top: 1rem;
            }

            .profile-user-name {
                font-size: 2.0rem;
                margin-bottom: 0px !important;
            }

            .profile-edit-insta-btn {
                order: 1;
                padding: 0;
                text-align: center;
                margin-top: 1rem;
            }

            .profile-edit-insta-btn {
                margin-left: 0;
            }

            .profile-bio {
                font-size: 1.4rem;
                margin-top: 1.5rem;
            }

            .profile-edit-insta-btn,
            .profile-bio,
            .profile-stats {
                flex-basis: 100%;
            }

            .profile-stats {
                order: 1;
                margin-top: 1.5rem;
            }

            .profile-stats ul {
                display: flex;
                text-align: center;
                padding: 1.2rem 0;
                border-top: 0.1rem solid #dadada;
                border-bottom: 0.1rem solid #dadada;
            }

            .profile-stats li {
                font-size: 1.4rem;
                flex: 1;
                margin: 0;
            }

            .profile-stat-count {
                display: block;
            }
        }

        /* Spinner Animation */

        @keyframes loader {
            to {
                transform: rotate(360deg);
            }
        }

        /*

  The following code will only run if your browser supports CSS grid.

  Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling.

  */

        @supports (display: grid) {
            .profile {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: repeat(3, auto);
                grid-column-gap: 3rem;
                align-items: center;
            }

            .profile-image {
                grid-row: 1 / -1;
            }

            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
                grid-gap: 2rem;
            }

            .profile-image,
            .profile-user-settings,
            .profile-stats,
            .profile-bio,
            .gallery-item {
                width: auto;
                margin: 0;
            }

            @media (max-width: 40rem) {
                .profile {
                    grid-template-columns: auto 1fr;
                    grid-row-gap: 1.5rem;
                }

                .profile-image {
                    grid-row: 1 / 2;
                }

                .profile-user-settings {
                    display: grid;
                    grid-template-columns: auto 1fr;
                    grid-gap: 1rem;
                }

                .profile-edit-insta-btn,
                .profile-stats,
                .profile-bio {
                    grid-column: 1 / -1;
                }

                .profile-user-settings,
                .profile-edit-insta-btn,
                .profile-settings-insta-btn,
                .profile-bio,
                .profile-stats {
                    margin: 0;
                }
            }
        }
    </style>
    <style>
        @media (min-width: 426px) {
            .router-link-exact-active .bottom-navigation-label {
                padding: 6px 12px 10px 12px !important;
                font-size: 14px !important;
                opacity: 1 !important;
                display: none !important;
            }
            .bottom-navigation-label {
                display: none !important;
            }
        }

        .form-field {
            --color: #f44336;
            outline: none;
            display: block;
            width: 100%;
            -webkit-appearance: none;
            background: #fff;
            border: 1px solid #cdd9ed;
            padding: 8px 16px;
            line-height: 22px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            transition: border 0.3s ease;
        }

        .bigTable {
            display: table;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
        }

        .cellInTheMiddle {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .smart-grid {
            width: 100%;
            height: 100%;
            display: grid;
            grid-gap: 8px;
            padding: 8px;
        }

        .button,
        .bottom-navigation {
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -o-user-select: none;
        }

        .button {
            color: var(--color-main);
            border-radius: 2px;
            position: relative;
            height: 36px;
            margin: 0;
            min-width: 64px;
            padding: 0 24px;
            display: inline-block;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0;
            overflow: hidden;
            will-change: box-shadow;
            transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1),
            background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1),
            color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            line-height: 36px;
            vertical-align: middle;
        }

        .button:hover {
            background-color: rgba(158, 158, 158, 0.2);
        }
        .button:focus:not(:active) {
            background-color: rgba(0, 0, 0, 0.12);
        }

        .button:active {
            background-color: rgba(158, 158, 158, 0.4);
        }

        .button .flat-button:focus:not(:active) {
            background-color: rgba(0, 0, 0, 0.12);
        }

        .bottom-navigation {
            overflow: hidden;
            background-color: white;
            transition: 375ms;
            position: fixed;
            height: 56px;
            width: 100%;
            bottom: 0;
            right: 0;
            font-size: 24px;
            box-shadow: 0 3px 14px 3px rgba(0, 0, 0, 0.12),
            0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-around;
        }

        .bottom-navigation .bottom-navigation-destination {
            padding: 16px 0 16px 0;
            float: left;
            text-align: center;
            flex-grow: 1;
            font-size: 12px;
            transition: 225ms cubic-bezier(0.4, 0.2, 0, 1);
            color: rgba(256, 256, 256, 0.87);
            cursor: pointer;
        }

        .bottom-navigation .bottom-navigation-destination.active {
            padding: 6px 12px 10px 12px;
        }

        .bottom-navigation-label {
            opacity: 0;
            transition: 225ms cubic-bezier(0.4, 0.2, 0, 1);
            color: black;
        }

        .bottom-navigation-destination.active .bottom-navigation-label {
            font-size: 14px;
            opacity: 1;
        }

        .bottom-navigation .bottom-navigation-destination .material-icons {
            font-size: 24px;
            z-index: 4;
            margin-bottom: 4px;
            display: block;
            color: black;
        }

        @media only screen and (max-width: 384px) {
            .smart-grid {
                display: block;
                padding: 8px;
            }

            .smart-grid > .card {
                margin-bottom: 8px;
            }
        }

        @media only screen and (max-width: 671px) {
            .smart-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            main {
                padding-bottom: 56px;
            }
        }

        @media screen and (min-width: 672px) {
            .smart-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            #logout {
                display: block;
            }
            #loader-pc {
                display: block;
            }

            #loader-mobile {
                display: none;
            }

            /* Bottom nav becomes side nav when screen is too big */
            .bottom-navigation {
                width: 64px;
                height: 100vh;
                left: 0;
                top: 0;
                right: initial;
                box-shadow: 0 3px 14px 3px rgba(0, 0, 0, 0.12),
                0 4px 15px rgba(0, 0, 0, 0.2);
                display: initial;
            }

            .bottom-navigation .bottom-navigation-destination {
                color: rgba(256, 256, 256, 0.54);
                padding: 20px;
            }

            /* No need for label on side nav */
            .bottom-navigation-label {
                display: block;
            }

            .bottom-navigation .bottom-navigation-destination.active {
                color: rgba(256, 256, 256, 0.87);
                padding: 20px;
            }

            .bottom-navigation .bottom-navigation-destination .material-icons {
                margin: 0;
            }

            /* <main> doesn't get covered by side nav */
            main {
                margin-left: 64px;
            }
        }

        @media only screen and (min-width: 1080px) {
            .smart-grid {
                padding: 30px;
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Shamelessly stolen from materialize */

        @media (max-width: 425px) {
            #logout {
                display: none;
            }
            #loader-pc {
                display: none;
            }
            #loader-mobile {
                display: block;
            }
        }
    </style>
</head>
<body>
<div id="app">
    <main>

        <router-view></router-view>

    </main>

    <nav class="bottom-navigation">
        <router-link
                class="bottom-navigation-destination"
                data-destination-color="white"
                style="text-decoration: none"
                to="/feed"
        >
            <i class="material-icons">sort</i>
            <span class="bottom-navigation-label">Feed</span>
        </router-link>

        <router-link
                class="bottom-navigation-destination"
                data-destination-color="white"
                style="text-decoration: none"
                to="/upload"
        >
            <i class="material-icons">add</i>
            <span class="bottom-navigation-label">Upload</span>
        </router-link>

        <router-link
                class="bottom-navigation-destination"
                data-destination-color="white"
                style="text-decoration:none;"
                to="/profile"
        >
            <i class="material-icons">account_circle</i>
            <span class="bottom-navigation-label">Profile</span>
        </router-link>
    </nav>
</div>

<!-- partial -->
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    'use strict';

    const changeColor = (click, that) => {
        // Set color of bottom nav
        let target = $(that).parent('.bottom-navigation');
        let color = $(that).attr('data-destination-color');
        $(target).css('background-color', color);
        // You'll have to add more of this in order to change the whole theme
        $('main').css('--color-main', color);
    };

    const bottomNavClick = (e, that) => {
        $('.active').removeClass('active');
        // console.log(typeof that);
        $(that).addClass('active');
        changeColor(e, that);
    };

    $('.bottom-navigation-destination').on('click', e => {
        e.stopPropagation();
        let x = $(e.currentTarget).hasClass('router-exact-active');
        bottomNavClick(e, e.currentTarget);
    });
</script>
</body>
</html>
