

    <style>
        input {
            border-radius: 0em;
    
        }
    
        .img {
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #999;
            padding: 1px;
            width: 220px;
            height: 200px;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            /* background:url(../img/imagen.jpg); */
            background-size: cover;
        }
    
        .img img {
            width: 100%;
        }
    
        @media all and (min-width: 500px) and (max-width: 1000px) {
            .img {
                margin: 20px auto;
                border-radius: 5px;
                border: 1px solid #999;
                padding: 1px;
                width: 300px;
                height: 280px;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                /* background:url(../img/imagen.jpg); */
                background-size: cover;
    
            }
        }
    
        .img img {
            width: 100%;
        }
        .color-2 {
      
      background:         linear-gradient(90deg, #f8f8f8 10%, #d8d7d6 90%);
    }
    .boxSep {
        display: flex;
        background-color: #ffffff;
        border: 1px solid #ddd;
        margin: 10px;
        float: left;
        margin-right: 30px;
        align-items: center;
        justify-content: center;
    }

    .LogSep {
        margin: 10px;
    }
    .texto-1 {
        font-size: 38px;
        text-align: center;
        clear: both;
        text-transform: none;
        line-height: 1.4;
        font-weight: 700;
        color: #fff;
        font-family: 'Montserrat', Helvetica, sans-serif;

    }

    p {
        font-family: 'Montserrat', Helvetica, sans-serif;
        font-size: 1.5rem;
        color: #fff;
        padding-top: 5px;
    }

    .seccion-1 {
        margin-top: 2.5rem;
        padding: 8rem;
    }

    .seccion-2 {
        margin-top: 2.5rem;
        padding: 5rem;
    }

    h4 {
        font-size: 24px;
    }

    #foot {
        width: 350px;
        height: 400px;
    }

    #time-range p {
        font-family: "Arial", sans-serif;
        font-size: 14px;
        color: #333;
    }

    .ui-slider-horizontal {
        height: 8px;
        background: #D7D7D7;
        border: 1px solid #BABABA;
        box-shadow: 0 1px 0 #FFF, 0 1px 0 #CFCFCF inset;
        clear: both;
        margin: 8px 0;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        -ms-border-radius: 6px;
        -o-border-radius: 6px;
        border-radius: 6px;
    }

    .ui-slider {
        position: relative;
        text-align: left;
    }

    .ui-slider-horizontal .ui-slider-range {
        top: -1px;
        height: 100%;
    }

    .ui-slider .ui-slider-range {
        position: absolute;
        z-index: 1;
        height: 8px;
        font-size: .7em;
        display: block;
        border: 1px solid #5BA8E1;
        box-shadow: 0 1px 0 #AAD6F6 inset;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        -khtml-border-radius: 6px;
        border-radius: 6px;
        background: #81B8F3;
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
        background-size: 100%;
        background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #4daae4), color-stop(100%, #2781e0));
        background-image: -webkit-linear-gradient(top, #4daae4, #2781e0);
        background-image: -moz-linear-gradient(top, #4daae4, #2781e0);
        background-image: -o-linear-gradient(top, #4daae4, #2781e0);
        background-image: linear-gradient(top, #4daae4, #2781e0);
    }

    .ui-slider .ui-slider-handle {
        border-radius: 50%;
        background: #F9FBFA;
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
        background-size: 100%;
        background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #C7CED6), color-stop(100%, #F9FBFA));
        background-image: -webkit-linear-gradient(top, #C7CED6, #F9FBFA);
        background-image: -moz-linear-gradient(top, #C7CED6, #F9FBFA);
        background-image: -o-linear-gradient(top, #C7CED6, #F9FBFA);
        background-image: linear-gradient(top, #C7CED6, #F9FBFA);
        width: 22px;
        height: 22px;
        -webkit-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
        -moz-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
        box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
        -webkit-transition: box-shadow .3s;
        -moz-transition: box-shadow .3s;
        -o-transition: box-shadow .3s;
        transition: box-shadow .3s;
    }

    .ui-slider .ui-slider-handle {
        position: absolute;
        z-index: 2;
        width: 22px;
        height: 22px;
        cursor: default;
        border: none;
        cursor: pointer;
    }

    .ui-slider .ui-slider-handle:after {
        content: "";
        position: absolute;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        top: 50%;
        margin-top: -4px;
        left: 50%;
        margin-left: -4px;
        background: #30A2D2;
        -webkit-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
        -moz-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 white;
        box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
    }

    .ui-slider-horizontal .ui-slider-handle {
        top: -.5em;
        margin-left: -.6em;
    }

    .ui-slider a:focus {
        outline: none;
    }

    .slider-range {
        width: 90%;
        margin: 0 auto;
    }

    #time-range {
        width: 200px;
    }

    </style>