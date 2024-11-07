<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title><?=$generalSetting->site_name?></title>
<meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 Admin Dashboard built for developers!" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<!-- Canonical SEO -->
<link rel="canonical" href="https://themeselection.com/item/sneat-dashboard-pro-bootstrap/">
<!-- Favicon -->
<link rel="icon" href="<?=env('UPLOADS_URL').$generalSetting->site_favicon?>">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/fonts/boxicons.css" />
<!-- Core CSS -->
<link rel="stylesheet" href="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="<?=env('FRONT_THEME_ASSETS_URL')?>assets/css/demo.css" />
<!-- Vendors CSS -->
<link rel="stylesheet" href="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<!-- Page CSS -->
<!-- Helpers -->
<script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/vendor/js/helpers.js"></script>
<script src="<?=env('FRONT_THEME_ASSETS_URL')?>assets/js/config.js"></script>
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="<?=env('FRONT_ASSETS_URL')?>assets/css/responsive.css">
<style type="text/css">
  * {
  margin: 0;
  padding: 0
  }
  html {
  height: 100%
  }
  p {
  color: grey
  }
  #heading {
  text-transform: uppercase;
  color: #c1272d;
  font-weight: normal
  }
  .msform {
  text-align: center;
  position: relative;
  margin-top: 20px
  }
  .msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 0.5rem;
  box-sizing: border-box;
  width: 100%;
  margin: 0;
  padding-bottom: 20px;
  position: relative
  }
  .form-card {
  text-align: left
  }
  .msform fieldset:not(:first-of-type) {
  display: none
  }
  .msform input, .msform textarea {
  display: block;
  width: 100%;
  padding: .4375rem .875rem;
  font-size: 0.9375rem;
  font-weight: 400;
  line-height: 1.53;
  color: #697a8d;
  appearance: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #d9dee3;
  border-radius: 4px;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  .msform input:focus,
  .msform textarea:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid #c1272d;
  outline-width: 0
  }
  .msform .action-button-previous {
  width: auto;
  background: #616161;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 0px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px 10px 0px;
  text-align: center;
  display: inline-block;
  padding: 10px 31px;
  font-size: 16px;
  border-radius: 30px;
  margin-top: 0px;
  float: right;
  }
  .msform .action-button:hover,
  .msform .action-button:focus {
  background-color: #311B92
  }
  .msform .action-button-previous {
  width: auto;
  background: #616161;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 0px;
  cursor: pointer;
  padding: 10px 5px;
  margin:0px;
  text-align: center;
  display: inline-block;
  padding: 10px 31px;
  font-size: 16px;
  border-radius: 30px;
  }
  .msform .action-button-previous:hover,
  .msform .action-button-previous:focus {
  background-color: #000000
  }
  .card {
  z-index: 0;
  border: none;
  position: relative
  }
  .fs-title {
  font-size: 25px;
  color: #c1272d;
  margin-bottom: 15px;
  font-weight: normal;
  text-align: left
  }
  .purple-text {
  color: #c1272d;
  font-weight: normal
  }
  .steps {
  font-size: 25px;
  color: gray;
  margin-bottom: 10px;
  font-weight: normal;
  text-align: right
  }
  .fieldlabels {
  color: gray;
  text-align: left
  }
  #progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  color: lightgrey;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  }
  .sidebar_new_horzi {
  display: flex;
  margin-bottom: 25px;
  background: #2e3192;
  border-radius: 5px;
  }
  .side-panel .sidebar_new_horzi li a {
  color: #fff;
  padding: 10px 15px;
  }
  .side-panel .sidebar_new_horzi li a i{
  padding-right:8px;
  }
  #progressbar .active {
  color: #c1272d
  }
  #progressbar li {
  list-style-type: none;
  font-size: 11px;
  width: 10%;
  float: left;
  position: relative;
  font-weight: 400;
  margin-bottom: 15px;
  padding: 0 5px;
  }
  #progressbar #form1:before {
  font-family: FontAwesome;
  content: "\f13e"
  }
  #progressbar #form2:before {
  font-family: FontAwesome;
  content: "\f007"
  }
  #progressbar #form3:before {
  font-family: FontAwesome;
  content: "\f030"
  }
  #progressbar #form4:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form5:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form6:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form7:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form8:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form9:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar #form10:before {
  font-family: FontAwesome;
  content: "\f00c"
  }
  #progressbar li:before {
  width: 50px;
  height: 50px;
  line-height: 45px;
  display: block;
  font-size: 20px;
  color: #ffffff;
  background: lightgray;
  border-radius: 50%;
  margin: 0 auto 10px auto;
  padding: 2px
  }
  #progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: lightgray;
  position: absolute;
  left: 0;
  top: 25px;
  z-index: -1
  }
  #progressbar li.active:before,
  #progressbar li.active:after {
  background: #c1272d
  }
  .progress {
  height: 20px
  }
  .progress-bar {
  background-color: #c1272d
  }
  .fit-image {
  width: 100%;
  object-fit: cover
  }
  @media screen and (max-width: 767px) {
  #progressbar {
  display: flex;
  flex-wrap: unset;
  justify-content: start;
  overflow: scroll;
  }
  #progressbar li::before {
  width: 40px;
  height: 40px;
  line-height: 37px;
  font-size: 15px;
  }
  #progressbar li {
  width: auto;
  }
  }
</style>
<style>
  #signature{
  width: 300px; height: 200px;
  border: 1px solid black;
  margin: 0 auto;
  }
  .btn-group {
  display: flex;
  justify-content: space-between;
  align-items: end;
  float: right;
  /*  position: absolute;*/
  bottom: 20px;
  left: 0;
  }
  .msform .theme-btn {
  margin-top: 30px !important;
  color: #ffff;
  background: #c1272c;
  float: right;
  }
  .msform .theme-btn:hover {
  background: #2e3192;
  }
  .msform input {
  margin-top: 4px;  
  }
  .preloder{
  height: 100vh;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #111;
  z-index:9999;
  }
  .loder{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 5px solid #D1DFFF;
  border-top: 8px solid #3775FF;
  animation: spinner 1s linear infinite;
  }
  @keyframes spinner{
  0%{
  transform: rotate(0deg);
  }
  50%{
  border-top-width: 5px;
  }
  100%{
  transform: rotate(360deg);
  }
  }
  @media screen and (max-width: 668px){
  .loder{
  height: 60px;
  width: 60px;
  border-top: 6px solid #3775FF;
  }
  }
  @font-face {
  font-family: 'willow bloom';
  src: url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
  url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
  font-weight: normal;
  font-style: normal;
  font-display: swap;
  }
  @font-face {
  font-family: 'willow bloom';
  src: url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff2') format('woff2'),
  url('https://qarp.itiffyconsultants.com/public/material/frontend/assets/fonts/willowbloom-Regular.woff') format('woff');
  font-weight: normal;
  font-style: normal;
  font-display: swap;
  }
  .signature{
  font-family: 'willow bloom';
  }
  input[type="radio"] {
  border: none;
  padding: 0;
  appearance: auto;
  }
  input[type="checkbox"] {
  border: none;
  padding: 0;
  appearance: auto;
  }
</style><?php /**PATH G:\xampp8.2\htdocs\qarp\resources\views/front/elements/afterhead.blade.php ENDPATH**/ ?>