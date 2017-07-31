<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Sarelo Receipt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
 <table cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td style="padding: 20px 0px 20px 0px;">
     <table border="1" align="center" cellpadding="0" cellspacing="0" style="max-width: 600px; border-color: #EEEEEE;">
       <tr>
         <td style="padding: 20px 0px 20px 0px;">
           <table align="center" cellpadding="0" cellspacing="0" width="100%">
             <tr>
               <td valign="bottom" align="right" style="padding: 20px 30px 0px 30px; color: #E4E4E4; font-weight: bold;font-size: 15px;" >
                 RECEIPT
               </td>
             </tr>
             <tr>
               <td align="center" style="padding: 0px 0px 20px 0px;">
                <img src="{{env("APP_URL")}}/assets/img/logo/sarelo3.svg" alt="sarelo" title="sarelo-logo" style="display:block" width="250" height="60">
               </td>
             </tr>
             <tr>
               <td align="center" style="padding: 0px 0px 20px 0px; color:#76747A; font-weight: 300;font-size: 15px;">
                 Co-Creation Hub | 6th Floor, 294 Herbert Macaulay Way<br>
                 Yaba Lagos State, Nigeria.<br>
                 Tel: +234 (01) 2950555
               </td>
             </tr>
             <tr>
               <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                 <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                     <td>
                       <table cellpadding="0" cellspacing="0" width="100%">
                         <tr>
                          <td width="260" valign="top">
                           <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                             <td>
                               <table cellpadding="0" cellspacing="0" width="100%">
                                 <tr>
                                   <td style="color #76747A;font-weight: bold;font-size: 14px;">PURCHASE DATE</td>
                                 </tr>
                                 <tr>
                                   <td style="color: #37353E;font-weight: normal;font-size: 14px;margin: 0;letter-spacing: -0.02em;">{{date('d M, Y', strtotime($order->created_at))}}</td>
                                 </tr>
                               </table>
                             </td>
                            </tr>
                           </table>
                          </td>
                          <td style="font-size: 0; line-height: 0;" width="20">
                           &nbsp;
                          </td>
                          <td width="260" valign="top">
                           <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                             <td>
                               <table cellpadding="0" cellspacing="0" width="100%">
                                 <tr>
                                   <td align="right" style="color #76747A;font-weight: bold;font-size: 14px;">Transaction Code</td>
                                 </tr>
                                 <tr>
                                   <td align="right" style="color: #37353E;font-weight: normal;font-size: 14px;margin: 0;letter-spacing: -0.02em;">
                                       {{strtoupper($order->order_unique_reference)}}
                                   </td>
                                 </tr>
                               </table>
                             </td>
                            </tr>
                           </table>
                          </td>
                         </tr>
                      </table>
                     </td>
                    </tr>
                 </table>
               </td>
             </tr>
             <tr>
               <td bgcolor="#ffffff" style="padding: 0px 30px 30px 30px;">
                 <table>
                   <tr>
                     <td style="padding: 40px 30px 40px 30px; border-bottom: 2px solid #E4E4E4; border-top: 2px solid #E4E4E4;">
                       <table cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                           <td>
                             <table cellpadding="0" cellspacing="0" width="100%">
                               <tr>
                                <td width="260" valign="top">
                                 <table cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                   <td>
                                     <table cellpadding="0" cellspacing="0" width="100%">
                                       <tr>
                                         <td style="color: #76747A;font-weight: bold;font-size: 14px;">PREPARED FOR</td>
                                       </tr>
                                       <tr>
                                         <td style="color: #37353E;font-weight: normal;font-size: 14px;margin: 0;letter-spacing: -0.02em;">{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                       </tr>
                                     </table>
                                   </td>
                                  </tr>
                                 </table>
                                </td>
                                <td style="font-size: 0; line-height: 0;" width="20">
                                 &nbsp;
                                </td>
                                <td width="260" valign="top">
                                 <table cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                   <td>
                                     <table cellpadding="0" cellspacing="0" width="100%">
                                       <tr>
                                         <td align="right" style="color: #76747A;font-weight: bold;font-size: 14px;">PACKAGE</td>
                                       </tr>
                                       <tr>
                                         <td align="right" style="color: #37353E;font-weight: normal;font-size: 14px;margin: 0;letter-spacing: -0.02em;">Personal</td>
                                       </tr>
                                     </table>
                                   </td>
                                  </tr>
                                 </table>
                                </td>
                               </tr>
                            </table>
                           </td>
                          </tr>
                       </table>
                     </td>
                   </tr>
                 </table>
               </td>
             </tr>
             <tr>
               <td bgcolor="#ffffff" style="padding: 0px 30px 0px 30px;">
                 <table width="100%">
                   <tr>
                     <td style="padding: 0px 30px 30px 30px; border-bottom: 2px solid #E4E4E4;">
                       <table cellpadding="0" cellspacing="0" width="100%">
                         <thead style="font-size: 10px;color: #76747A; font-weight: 600;font-family: 'Montserrat', sans-serif;text-transform: uppercase;">
                          <tr>
                            <td style="padding: 0px 0px 0px 10px;">PRODUCT DESCRIPTION</td>
                            <td align="center">UNIT</td>
                            <td align="center">RATE PER UNIT</td>
                            <td align="right" style="padding: 0px 10px 0px 0px;">TOTAL</td>
                          </tr>
                         </thead>
                         <tbody style="font-size: 12px;">
                           @foreach($order->order_products as $order_product)
                            <tr>
                              <td style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">{{$order_product->product->name}}</td>
                              <td align="center" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">{{$order_product->qty}}</td>
                              <td align="center" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">&#x20A6; {{number_format($order_product->product->price, 2)}}</td>
                              <td align="right" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">&#x20A6; {{number_format($order_product->sub_total, 2)}}</td>
                            </tr>
                           @endforeach
                           
                            <tr>
                              <b>Delivery Fee </b><td align="right" colspan="4" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">&#x20A6; {{number_format($order->delivery_fee, 2)}}</td>
                            </tr>
                            <tr>
                              <b>Service Charge </b><td align="right" colspan="4" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">&#x20A6; {{number_format($order->service_charge, 2)}}</td>
                            </tr>
                             <tr>
                              <b>Total </b><td align="right" colspan="4" style="padding: 20px 10px 20px 10px; border-top: 1px solid #DDDDDD;">&#x20A6; {{number_format($order->total, 2)}}</td>
                            </tr>
                         </tbody>
                       </table>
                     </td>
                   </tr>
                 </table>
               </td>
             </tr>
             <tr>
               <td bgcolor="#ffffff" style="padding: 40px 30px 0px 30px;">
                 <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td align="right">
                           <table cellpadding="0" cellspacing="0" width="100%">
                             <tr>
                               <td>
                                 <img src="assets/img/signature.png" alt="Signature" width="100" height="100" style="display: block;" border="0" />
                               </td>
                             </tr>
                             <tr>
                               <td>
                                 <b>JJ Jones</b>, CEO
                               </td>
                             </tr>
                           </table>
                        </td>
                      </tr>
                 </table>
               </td>
             </tr>
             <tr>
               <td style="padding: 40px 30px 40px 30px;">
                 <table>
                   <tr>
                     <td bgcolor="#ffffff" align="justify" style="border-top: 2px solid #E4E4E4; padding: 30px 0px 0px 0px;">
                       Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                     </td>
                   </tr>
                 </table>
               </td>
             </tr>
             <tr>
              <td style="padding: 30px 30px 30px 30px;">
                <table cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                   <td align="center">
                     <a href="#">Privacy</a>
                   </td>
                   <td align="center">
                     <a href="#">Terms and Condition</a>
                   </td>
                   <td align="center">
                     <a href="#">Feedbacks</a>
                   </td>
                 </tr>
                </table>
              </td>
             </tr>
            </table>
         </td>
       </tr>
     </table>
   </td>
  </tr>
 </table>
</body>
</html>