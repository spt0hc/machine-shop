<style>
    .header-menu {
        border-top: 1px solid rgba(128,128,128,0.43);
        margin: 0 auto;
        margin-top: 0px;
        height: 43px;

    }
    .header-menu.header-menu.hidden-sm.hidden-md.hidden-lg {
        height: auto;
    }
    .cat {
        width:100%;
        margin:0 auto;
    }

    .cat ul li {
        float:left;
        list-style: none;
        padding: 5px 10px;
        font-size: 14px;
    }
    .cat ul li a {
        text-decoration: none;
        color:black;
    }
    .cat ul li a:hover {
        color:#00f;
    }
    .cat ul li.home-page {
        font-size: 20px;
    }
    .cat ul li.home-page a{
        color:#ff4040;
    }
    .cat ul li:not(.home-page) {
        margin-top: 5px;
    }
    .header-menu .service-m {
        padding: 5px;
        font-size: 16px;
    }
    .header-menu .service-m p {
        margin-top: 5px;
        text-align: center;
    }
    .header-menu .service-m p a {
        text-decoration: none;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .service p{
        margin-top: 12px;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .service p a {
        color:black;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .service:hover {
        background: #39c !important;
       }
    .header-menu.hidden-sm.hidden-md.hidden-lg .service:hover a{
        color:white !important;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .cat .menu-btn {
        cursor: pointer;
        float: right;
        margin-right: 10px;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .cat .drop-menu {
        background: #8eff46;
        display: none;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .cat .drop-menu li{
        clear: both;
        width: 100%;
        text-align: center;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .cat .drop-menu li:hover {
        background: #39c;
    }
    .header-menu.hidden-sm.hidden-md.hidden-lg .cat .drop-menu li:hover a{
        color:#fff;
    }
    .cus-carts {
        color:#39c;
        margin-top: 10px;
        font-size: 20px;
        cursor:pointer;
        margin-right: 10px;
        position: fixed;
        bottom: 120px;
        right: 20px;
        z-index: 9999;
        background: #fff;
        box-shadow: 0 1px 1px 1px rgba(128,128,128,0.32);
        padding: 6px;
        border-radius: 4px;
    }
    .cus-carts span  {
        transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -ms-transform: scaleX(-1);
    }
    .header-menu .cat > ul >li{
        position: relative;
        cursor: pointer;
    }
    .header-menu .cat .sub-menu{
        position: absolute;
        z-index: 122;
        background: #fff;
        min-width:200px;
        display: none;
    }
    .header-menu .cat > ul >li:hover .sub-menu{
        display: block;
    }
    .header-menu .cat .sub-menu > li {
        clear: both !important;
        width: 100%;
    }
    .header-menu .cat .sub-menu > li:hover {
        background: #39c;
    }
    .header-menu .cat .sub-menu > li:hover a{
        color:#fff;
    }
    .header-menu .cat  .promotional {
        animation: nhapnhay .5s ease-in infinite;
    }
    @keyframes nhapnhay {
        from{color:rgb(255,143,143);text-shadow: 0 0 1px #ff4040}
        to{color:#ff4040;text-shadow: 0 0 8px #ff4040}
    }

</style>