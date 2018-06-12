<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

 	function __construct() {
 		parent::__construct();
 		$this->_public_view= $this->config->item('public_view');
 		$this->load->model('Model_lib');
 	}
	public function open()
	{
		$this->load->view('email');
	}

     public function sendMail(){
          //Load email library
     $this->load->library('email');

     //SMTP & mail configuration
     $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => 'ssl://smtp.googlemail.com',
         'smtp_port' => 465,
         'smtp_user' => 'muammar.clasic@gmail.com',
         'smtp_pass' => 'sudo-apt-get-update',
         'mailtype'  => 'html',
         'charset'   => 'utf-8'
     );
     $this->email->initialize($config);
     $this->email->set_mailtype("html");
     $this->email->set_newline("\r\n");

     //Email content
     $htmlContent = '
     <html>

     <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Welcome</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script>

      </script>
     </head>

     <body bgcolor="#FFFFFF">

      <table border="0" cellpadding="10" cellspacing="0" style="background-color: #FFFFFF;width: 700px;margin-left: auto;margin-right: auto;">
         <tr>
           <td>
             <!--[if (gte mso 9)|(IE)]>
           <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
             <tr>
               <td>
         <![endif]-->

             <table align="center" border="0" cellpadding="0" cellspacing="0" class=
             "content" style="background-color: #FFFFFF">

               <tr>
                 <td align="center" valign="top">
                   <table border="0" cellpadding="0" cellspacing="0" class=
                   "brdBottomPadd-two" id="templateContainer" width="100%">
                     <tr>
                       <td class="bodyContent" valign="top" mc:edit="welcomeEdit-02">
                         <p>Hi '.$_SESSION["daftarN"].'</p>

                         <h1><strong>Congratulations on signing up. <br></strong></h1>

                         <h3>We re excited to have you get started. First, you need to confirm your account. Just press the button below.</h3>
                       </td>
                     </tr>
                     <tr>
                          <td style="padding-left: 35%;">
                              <a type="button" href='.base_url()."index.php/confirmation/emailconf/".$_SESSION["id"]."/".$_SESSION["kode"]."/".$_SESSION["table"].' style="width:150px;height:36px;background-color: #d4d4d4;border: none;display:block;padding-top:11px;text-align:center;"> confirmation </a>
                          </td>
                     </tr>
                     <tr align="top">
                       <td class="bodyContentImage" valign="top">
                         <table border="0" cellpadding="0" cellspacing="0">
                           <tr>
                             <td align="left" style=
                             "margin:0;padding-top:10px;line-height:1;" valign=
                             "top" mc:edit="welcomeEdit-04">
                               <h4><strong>MEMOLLAGE</strong></h4>

                               <h5>Team Work</h5>
                             </td>
                           </tr>
                         </table>
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>
             </table><!--[if (gte mso 9)|(IE)]>
               </td>
             </tr>
         </table>
         <![endif]-->
           </td>
         </tr>
      </table>

      <style type="text/css">

         span.preheader {
         display:none!important
         }
         td ul li {
           font-size: 16px;
         }

         /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
         #outlook a {
         padding:0
         }

         /* Force Outlook to provide a "view in browser" message */
         .ReadMsgBody {
         width:100%
         }

         .ExternalClass {
         width:100%
         }

         /* Force Hotmail to display emails at full width */
         .ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {
         line-height:100%
         }

         /* Force Hotmail to display normal line spacing */
         body,table,td,p,a,li,blockquote {
         -webkit-text-size-adjust:100%;
         -ms-text-size-adjust:100%
         }

         /* Prevent WebKit and Windows mobile changing default text sizes */
         table,td {
         mso-table-lspace:0;
         mso-table-rspace:0
         }

         /* Remove spacing between tables in Outlook 2007 and up */
         /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
         body {
         margin:0;
         padding:0
         }

         img {
         max-width:100%;
         border:0;
         line-height:100%;
         outline:none;
         text-decoration:none
         }

         table {
         border-collapse:collapse!important
         }

         .content {
         width:100%;
         max-width:600px
         }

         .content img {
         height:auto;
         min-height:1px
         }

         #bodyTable {
         margin:0;
         padding:0;
         width:100%!important
         }

         #bodyCell {
         margin:0;
         padding:0
         }

         #bodyCellFooter {
         margin:0;
         padding:0;
         width:100%!important;
         padding-top:39px;
         padding-bottom:15px
         }

         body {
         margin:0;
         padding:0;
         min-width:100%!important
         }

         #templateContainerHeader {
         font-size:14px;
         padding-top:2.429em;
         padding-bottom:.929em
         }

         #templateContainerFootBrd {
         border-bottom:1px solid #e2e2e2;
         border-left:1px solid #e2e2e2;
         border-right:1px solid #e2e2e2;
         border-radius:0 0 4px 4px;
         background-clip:padding-box;
         border-spacing:0;
         height:10px;
         width:100%!important
         }

         #templateContainer {
         border-top:1px solid #e2e2e2;
         border-left:1px solid #e2e2e2;
         border-right:1px solid #e2e2e2;
         border-radius:4px 4px 0 0;
         background-clip:padding-box;
         border-spacing:0
         }

         #templateContainerMiddle {
         border-left:1px solid #e2e2e2;
         border-right:1px solid #e2e2e2
         }

         #templateContainerMiddleBtm {
         border-left:1px solid #e2e2e2;
         border-right:1px solid #e2e2e2;
         border-bottom:1px solid #e2e2e2;
         border-radius:0 0 4px 4px;
         background-clip:padding-box;
         border-spacing:0
         }

         #templateContainerMiddleBtm .bodyContent {
         padding-bottom:2em
         }

         /**
         * @tab Page
         * @section heading 1
         * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
         * @style heading 1
         */
         h1 {
         color:#2e2e2e;
         display:block;
         font-family:Helvetica;
         font-size:26px;
         line-height:1.385em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         /**
         * @tab Page
         * @section heading 2
         * @tip Set the styling for all second-level headings in your emails.
         * @style heading 2
         */
         h2 {
         color:#2e2e2e;
         display:block;
         font-family:Helvetica;
         font-size:22px;
         line-height:1.455em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         /**
         * @tab Page
         * @section heading 3
         * @tip Set the styling for all third-level headings in your emails.
         * @style heading 3
         */
         h3 {
         color:#545454;
         display:block;
         font-family:Helvetica;
         font-size:18px;
         line-height:1.444em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         /**
         * @tab Page
         * @section heading 4
         * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
         * @style heading 4
         */
         h4 {
         color:#545454;
         display:block;
         font-family:Helvetica;
         font-size:14px;
         line-height:1.571em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         h5 {
         color:#545454;
         display:block;
         font-family:Helvetica;
         font-size:13px;
         line-height:1.538em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         h6 {
         color:#545454;
         display:block;
         font-family:Helvetica;
         font-size:12px;
         line-height:2em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         p {
         color:#545454;
         display:block;
         font-family:Helvetica;
         font-size:16px;
         line-height:1.5em;
         font-style:normal;
         font-weight:400;
         letter-spacing:normal;
         margin-top:0;
         margin-right:0;
         margin-bottom:15px;
         margin-left:0;
         text-align:left
         }

         .unSubContent a:visited {
         color:#a1a1a1;
         text-decoration:underline;
         font-weight:400
         }

         .unSubContent a:focus {
         color:#a1a1a1;
         text-decoration:underline;
         font-weight:400
         }

         .unSubContent a:hover {
         color:#a1a1a1;
         text-decoration:underline;
         font-weight:400
         }

         .unSubContent a:link {
         color:#a1a1a1;
         text-decoration:underline;
         font-weight:400
         }

         .unSubContent a .yshortcuts {
         color:#a1a1a1;
         text-decoration:underline;
         font-weight:400
         }

         .unSubContent h6 {
         color:#a1a1a1;
         font-size:12px;
         line-height:1.5em;
         margin-bottom:0
         }

         .bodyContent {
         color:#505050;
         font-family:Helvetica;
         font-size:14px;
         line-height:150%;
         padding-top:3.143em;
         padding-right:3.5em;
         padding-left:3.5em;
         padding-bottom:.714em;
         text-align:left
         }

         .bodyContentImage {
         color:#505050;
         font-family:Helvetica;
         font-size:14px;
         line-height:150%;
         padding-top:0;
         padding-right:3.571em;
         padding-left:3.571em;
         padding-bottom:1.357em;
         text-align:left
         }

         .bodyContentImage h4 {
         color:#4E4E4E;
         font-size:13px;
         line-height:1.154em;
         font-weight:400;
         margin-bottom:0
         }

         .bodyContentImage h5 {
         color:#828282;
         font-size:12px;
         line-height:1.667em;
         margin-bottom:0
         }

         /**
         * @tab Body
         * @section body link
         * @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
         */
         a:visited {
         color:#3386e4;
         text-decoration:none;
         }

         a:focus {
         color:#3386e4;
         text-decoration:none;
         }

         a:hover {
         color:#3386e4;
         text-decoration:none;
         }

         a:link {
         color:#3386e4;
         text-decoration:none;
         }

         a .yshortcuts {
         color:#3386e4;
         text-decoration:none;
         }

         .bodyContent img {
         height:auto;
         max-width:498px
         }

         .footerContent {
         color:gray;
         font-family:Helvetica;
         font-size:10px;
         line-height:150%;
         padding-top:2em;
         padding-right:2em;
         padding-bottom:2em;
         padding-left:2em;
         text-align:left
         }

         /**
         * @tab Footer
         * @section footer link
         * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
         */
         .footerContent a:link,.footerContent a:visited,/* Yahoo! Mail Override */ .footerContent a .yshortcuts,.footerContent a span /* Yahoo! Mail Override */ {
         color:#606060;
         font-weight:400;
         text-decoration:underline
         }

         /**
         * @tab Footer
         * @section footer link
         * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
         */
         .bodyContentImageFull p {
         font-size:0!important;
         margin-bottom:0!important
         }

         .brdBottomPadd {
         border-bottom:1px solid #f0f0f0
         }

         .brdBottomPadd-two {
         border-bottom:1px solid #f0f0f0
         }

         .brdBottomPadd .bodyContent {
         padding-bottom:2.286em
         }

         .brdBottomPadd-two .bodyContent {
         padding-bottom:.857em
         }

         a.blue-btn {
           background: #5098ea;
           display: inline-block;
           color: #FFFFFF;
           border-top:10px solid #5098ea;
           border-bottom:10px solid #5098ea;
           border-left:20px solid #5098ea;
           border-right:20px solid #5098ea;
           text-decoration: none;
           font-size: 14px;
           margin-top: 1.0em;
           border-radius: 3px 3px 3px 3px;
           background-clip: padding-box;
         }

         .bodyContentTicks {
         color:#505050;
         font-family:Helvetica;
         font-size:14px;
         line-height:150%;
         padding-top:2.857em;
         padding-right:3.5em;
         padding-left:3.5em;
         padding-bottom:1.786em;
         text-align:left
         }

         .splitTicks {
         width:100%
         }

         .splitTicks--one {
         width:19%;
         color:#505050;
         font-family:Helvetica;
         font-size:14px;
         padding-bottom:1.143em
         }

         .splitTicks--two {
         width:5%
         }

         .splitTicks--three {
         width:71%;
         color:#505050;
         font-family:Helvetica;
         font-size:14px;
         padding-top:.714em
         }

         .splitTicks--three h3 {
         margin-bottom:.278em
         }

         .splitTicks--four {
         width:5%
         }

         @media only screen and (max-width: 550px),screen and (max-device-width: 550px) {
         body[yahoo] .hide {
         display:none!important
         }

         body[yahoo] .buttonwrapper {
         background-color:transparent!important
         }

         body[yahoo] .button {
         padding:0!important
         }

         body[yahoo] .button a {
         background-color:#e05443;
         padding:15px 15px 13px!important
         }

         body[yahoo] .unsubscribe {
         font-size:14px;
         display:block;
         margin-top:.714em;
         padding:10px 50px;
         background:#2f3942;
         border-radius:5px;
         text-decoration:none!important
         }
         }

         @media only screen and (max-width: 480px),screen and (max-device-width: 480px) {
           .bodyContentTicks {
             padding:6% 5% 5% 6%!important
           }

           .bodyContentTicks td {
             padding-top:0!important
           }

           h1 {
             font-size:34px!important
           }

           h2 {
             font-size:30px!important
           }

           h3 {
             font-size:24px!important
           }

           h4 {
             font-size:18px!important
           }

           h5 {
             font-size:16px!important
           }

           h6 {
             font-size:14px!important
           }

           p {
             font-size:18px!important
           }

           .brdBottomPadd .bodyContent {
             padding-bottom:2.286em!important
           }

           .brdBottomPadd-two .bodyContent {
             padding-bottom:.857em!important
           }

           #templateContainerMiddleBtm .bodyContent {
             padding:6% 5% 5% 6%!important
           }

           .bodyContent {
             padding:6% 5% 1% 6%!important
           }

           .bodyContent img {
             max-width:100%!important
           }

           .bodyContentImage {
             padding:3% 6% 6%!important
           }

           .bodyContentImage img {
             max-width:100%!important
           }

           .bodyContentImage h4 {
             font-size:16px!important
           }

           .bodyContentImage h5 {
             font-size:15px!important;
             margin-top:0
           }
         }
         .ii a[href] {color: inherit !important;}
         span > a, span > a[href] {color: inherit !important;}
         a > span, .ii a[href] > span {text-decoration: inherit !important;}
      </style>

     </body>
     </html>
     ';


     $this->email->to($_SESSION["daftarE"]);
     $this->email->from('muammar.clasic@gmail.com');
     $this->email->subject('WELCOME TO MEMOLLAGE');
     $this->email->message($htmlContent);

     //Send email
          if($this->email->send()){
                    echo "success";
          }else {
                    echo "error";
          }
     }
}