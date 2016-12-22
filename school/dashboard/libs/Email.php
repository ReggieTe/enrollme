<?php
/**
 * Description of Email
 *
 * @author Reggie Te
 */
class Email {
    /**
 * 
 * @param string $subject
 * @param string $message
 * @param string $to
 * @param string $from
 * @return boolean
 */
public static function sendMail($subject,$message,$to,$from = 'MyApps <info@myapps.co.zw>')
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "From: " . $from . "\r\n";
    // Send this message;
    $result = mail( $to, $subject, Email::template($message), $headers);
    return $result;
    
}
/**
 * 
 * @param string $link
 * @return string
 */
public static function verifyAccount($link){
        $message='Hi<br>Thank you for creating an Account on MyApps. Click <a href="'.$link.'">Verify Account</a> <br>MyApps Team';
   return $message;
    }
    /**
     * 
     * @param string $link
     * @return string
     */
public static function resetPassword($link){
     $message='Hi<br> Account password reset.click the link <a href="'.$link.'">Reset Password</a><br>MyApps Team"';
    return $message;
    
    }
    
public static function deleteAccount($link){
     $message='Hi<br> Account delete ..click the link <a href="'.$link.'">Delete Account</a><br>MyApps Team"';
    return $message;
    
    }
/**
 * 
 * @return string
 */
public static function passwordChange(){
     $date=date("d/m/y ");
     $message=' Hi<br>Account password changed on '.$date.' <br> MyApps Team';
    return $message;
    
    }
/**
 * 
 * @param string $notification
 * @return string
 */
public static function template($notification) {
      $message='
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>MyApps | Email</title>
	</head>
	<body style="margin: 0; padding: 0;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>

					<!-- Header Top Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td align="left"  bgcolor="#2e3537">
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
											</table>
											<table align="center">
												<tr>
													<td width="22">
														<img src="http://myapps.co.zw/images/mail/marker-icon-white.png" alt="location" />
													</td>
													<td style="color: #fff; font-size: 12px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">MyApps ,Harare,Zimbabwe</td>
													<td width="22"></td>
													<td width="22">
														<img src="http://myapps.co.zw/images/mail/phone-icon-white.png" alt="location" />
													</td>
													<td style="color: #fff; font-size: 12px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">+263&nbsp;777&nbsp;967&nbsp;940</td>
													<td width="22"></td>
													<td width="22">
														<img src="http://myapps.co.zw/images/mail/mail-icon-white.png" alt="location" />
													</td>
													<td>
														<a style="color: #fff; font-size: 12px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif; text-decoration:none;" href="mailto:info@myapps.co.zw">info@myapps.co.zw</a>
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- Header Top End -->

					<!-- Header Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td style="padding:15px 0 0 0;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="200" style="border-collapse: collapse;">
												<!-- logo -->
												<tr>
													<td align="left">
														<a href="http://myapps.co.zw/">
															<img src="http://myapps.co.zw/images/logo.png" alt="MyApps Logo" style="display: block;"/>
														</a>
													</td>
												</tr>
												<!-- company slogan -->
												<tr>
													<td width="100%" align="left" style="font-size: 12px; line-height: 18px; font-family:helvetica, Arial, sans-serif; color:#999999;">	
														Home of Innovative Design
													</td>
												</tr>									
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
											</table>
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="370" style="border-collapse: collapse;">
												<tr>
													<td  height="75" style="text-align: right; vertical-align: middle;">
														<a href="http://myapps.co.zw/services" style="font-family:helvetica, Arial, sans-serif; color: #333333; font-size: 16px; text-decoration: none;">Services</a> &nbsp;&nbsp;
														<a href="http://myapps.co.zw/hires" style="font-family:helvetica, Arial, sans-serif; color: #333333; font-size: 16px; text-decoration: none;">Hire Developers</a> &nbsp;&nbsp;
														<a href="http://myapps.co.zw/portfolio" style="font-family:helvetica, Arial, sans-serif; color: #333333; font-size: 16px; text-decoration: none;">Portfolio</a> &nbsp;&nbsp;
														<a href="http://myapps.co.zw/info/contact" style="font-family:helvetica, Arial, sans-serif; color: #333333; font-size: 16px; text-decoration: none;">Contact</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- Header End -->

					<!-- Banner Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr>
													<td align="left" bgcolor="#ffffff" style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px; text-align: left;"s >
													'. $notification.'
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
                                        <br></br><br></br>
					<!-- Banner End -->

					<!-- Section Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<!-- Space -->
									<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
									<tr>
										<td width="100%" align="center" style="font-size: 28px; line-height: 34px; font-family:helvetica, Arial, sans-serif; color:#343434;">
											Our <strong>Services</strong>
										</td>
									</tr>
									<!-- Space -->
									<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
								</table>
								<!-- First Row -->
								<table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- first column -->
											<table align="left" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0" width="290" style="border-collapse: collapse;">
												<tr>
													<td>
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/#">
																		<img src="http://myapps.co.zw/images/mail/feature-icon-1.png" width="60" alt="Feature" style="display: block;"/>
																	</a>
																</td>
															</tr>
														</table>
														<table width="250" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/web" style="font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #333333; line-height: 24px; text-decoration: none;">Website Design</a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px; text-align: center;">
																																	</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td>
																	<table width="100" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
																		<tr>
																			<td align="center">
																				<a href="http://myapps.co.zw/service/web" style="color: #3697d9; font-size: 15px; line-height: 15px; font-weight: normal; text-decoration: none; font-family: helvetica, Arial, sans-serif;">Read More</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- second column -->
											<table align="left" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0" width="290" style="border-collapse: collapse;">
												<tr>
													<td>
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/#">
																		<img src="http://myapps.co.zw/images/mail/feature-icon-2.png" width="60" alt="Feature" style="display: block;"/>
																	</a>
																</td>
															</tr>
														</table>
														<table width="250" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/mobile" style="font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #333333; line-height: 24px; text-decoration: none;">Mobile Application </a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px; text-align: center;">
																	
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td>
																	<table width="100" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
																		<tr>
																			<td align="center">
																				<a href="http://myapps.co.zw/service/mobile" style="color: #3697d9; font-size: 15px; line-height: 15px; font-weight: normal; text-decoration: none; font-family: helvetica, Arial, sans-serif;">Read More</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- Second Row -->
								<table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- first column -->
											<table align="left" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0" width="290" style="border-collapse: collapse;">
												<tr>
													<td>
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/ssl">
																		<img src="http://myapps.co.zw/images/mail/feature-icon-3.png" width="60" alt="Feature" style="display: block;"/>
																	</a>
																</td>
															</tr>
														</table>
														<table width="250" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/ssl" style="font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #333333; line-height: 24px; text-decoration: none;">SSL Certificates</a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px; text-align: center;">
																	
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td>
																	<table width="100" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
																		<tr>
																			<td align="center">
																				<a href="http://myapps.co.zw/service/ssl" style="color: #3697d9; font-size: 15px; line-height: 15px; font-weight: normal; text-decoration: none; font-family: helvetica, Arial, sans-serif;">Read More</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="40">&nbsp;</td></tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- second column -->
											<table align="left" bgcolor="#fafafa" border="0" cellpadding="0" cellspacing="0" width="290" style="border-collapse: collapse;">
												<tr>
													<td>
														<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/support">
																		<img src="http://myapps.co.zw/images/mail/feature-icon-4.png" width="60" alt="Feature" style="display: block;"/>
																	</a>
																</td>
															</tr>
														</table>
														<table width="250" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td align="center">
																	<a href="http://myapps.co.zw/service/support" style="font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #333333; line-height: 24px; text-decoration: none;">I.T Support</a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px; text-align: center;">
																	
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td>
																	<table width="100" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
																		<tr>
																			<td align="center">
																				<a href="http://myapps.co.zw/service/support" style="color: #3697d9; font-size: 15px; line-height: 15px; font-weight: normal; text-decoration: none; font-family: helvetica, Arial, sans-serif;">Read More</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="40">&nbsp;</td></tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<!-- Border -->
									<tr><td bgcolor="#f5f5f5" style="font-size: 0; line-height: 0;" height="1">&nbsp;</td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- Section End -->

					

					<!-- Section Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table align="center" bgcolor="#3697d9" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<!-- Border -->
												<tr><td bgcolor="#3697d9" style="font-size: 0; line-height: 0;" height="1">&nbsp;</td></tr>
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr>
													<td>
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="400" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="3">&nbsp;</td></tr>
															<tr>
																<td width="100%" align="center" style="font-size: 28px; line-height: 34px; font-family:helvetica, Arial, sans-serif; color:#ffffff;">
																	Waste no More Time
																</td>
															</tr>
														</table>
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="140" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="0">&nbsp;</td></tr>
															<tr>
																<td width="100%" align="center" style="padding:12px 12px 12px 12px; text-align: center;border-radius:4px;" bgcolor="#f1f1f1">
																	<a href="http://myapps.co.zw/#" style="color: #000000; font-size: 16px; font-weight: normal; text-decoration: none; font-family: helvetica, Arial, sans-serif;">Get In Touch</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!-- Section End -->

					<!-- Section Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#ffffff" width="580" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
									<tr>
										<td>
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="550" style="border-collapse: collapse;">
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
												<tr>
													<td width="100%" align="center" style="font-size: 28px; line-height: 34px; font-family:helvetica, Arial, sans-serif; color:#343434;">
														Our <strong>Team</strong>
													</td>
												</tr>
												<!-- Space -->
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
											<!-- First Row -->
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="550" style="border-collapse: collapse;">
												<tr>
													<td>
														<table align="left" border="0" cellpadding="0" width="180" cellspacing="0" style="border-collapse: collapse;">
															<tr>
																<td>
																	<a href="http://myapps.co.zw/#">
																		<img src="http://myapps.co.zw/images/mail/team-member-1.png" width="180" alt="Team Member 1" style="display: block;"/>
																	</a>
																</td>
															</tr>
														</table>
														<!-- Grid Gutter 20px -->
														<table align="left" border="0" cellpadding="0" width="20" cellspacing="0" style="border-collapse: collapse;">
															<tr>
																<td>&nbsp;</td>
															</tr>
														</table>
														<table align="left" border="0" cellpadding="0" width="350" cellspacing="0" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td>
																	<a style="text-decoration:none; font-family: helvetica, Arial, sans-serif; font-size: 22px; color: #343434; line-height: 26px;" href="http://myapps.co.zw/#">Tariro Chimanga</a>
																</td>
															</tr>
															<tr>
																<td style="text-decoration:none; font-family: helvetica, Arial, sans-serif; font-size: 12px; color: #999999; line-height: 18px;">
																	PROJECT MANAGER
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td style="font-family: helvetica, Arial, sans-serif; font-size: 14px; color: #777777; line-height: 21px;">
															</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td>
																	<table width="80" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
																		<tr>
																			<td style="color: #777777;font-family: helvetica, Arial, sans-serif; font-size:15px;">
																				email:&nbsp;<a style="font-family: helvetica, Arial, sans-serif; font-size: 15px;text-decoration:none; line-height: 14px; color: #3697d9;" href="http://myapps.co.zw/mailto:chimangatari@myapps.co.zw">chimangatari@myapps.co.zw</a>
																			</td>
																		</tr>
																		<!-- Space -->
																		<tr><td style="font-size: 0; line-height: 0;" height="5">&nbsp;</td></tr>
																		<tr>
																			<td style="font-family: helvetica, Arial, sans-serif; font-size: 15px; line-height: 14px; color: #777777;">
																				tel:&nbsp;+263&nbsp;778&nbsp;608&nbsp;966
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="550" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
												<tr><td style="font-size: 0; line-height: 0;" bgcolor="#f5f5f5" height="1">&nbsp;</td></tr>
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
											
											
											<table width="550" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
			

					<!-- Footer Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#ffffff" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
												<tr>
													<td>
														<!-- First Column -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" style="border-collapse: collapse;">
															<tr>
																<td>
																	<a href="http://myapps.co.zw/">
																		<img src="http://myapps.co.zw/images/logo.png" alt="Logo" style="display: block;"/>
																	</a>
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
															<tr>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">
																	Home of Innovative Design.
																</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
															<tr>
																<td>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="45" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="http://myapps.co.zw/https://www.facebook.com/myzimapps">
																					<img src="http://myapps.co.zw/images/mail/facebook-icon.png"  alt="Facebook" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="45" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="http://myapps.co.zw/https://www.twitter.com/myappszw">
																					<img src="http://myapps.co.zw/images/mail/twitter-icon.png"  alt="Twitter" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="45" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="http://myapps.co.zw/https://plus.google.com/myappszw">
																					<img src="http://myapps.co.zw/images/mail/googleplus-icon.png"  alt="Google+" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																	<table align="left" border="0" cellpadding="0" cellspacing="0" width="45" style="border-collapse: collapse;">
																		<tr>
																			<td>
																				<a href="http://myapps.co.zw/https://www.linkedin.com/myappszw">
																					<img src="http://myapps.co.zw/images/mail/linkedin-icon.png"  alt="Linked In" style="display: block;" />
																				</a>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
														<!-- Gutter 20px -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="40" style="border-collapse: collapse;">
															<tr>
																<td>
																	&nbsp;
																</td>
															</tr>
														</table>
														<!-- Second Column -->
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="250" style="border-collapse: collapse;">
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="57">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://myapps.co.zw/images/mail/marker-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">MyApps ,Harare,Zimbabwe</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://myapps.co.zw/images/mail/phone-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">+263&nbsp;777&nbsp;967&nbsp;940</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://myapps.co.zw/images/mail/fax-icon.png" alt="location" />
																</td>
																<td style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">+263&nbsp;778&nbsp;608&nbsp;966</td>
															</tr>
															<!-- Space -->
															<tr><td style="font-size: 0; line-height: 0;" height="10">&nbsp;</td></tr>
															<tr>
																<td width="22">
																	<img src="http://myapps.co.zw/images/mail/mail-icon.png" alt="location" />
																</td>
																<td>
																	<a style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif; text-decoration:none;" href="mailto:info@myapps.co.zw">info@myapps.co.zw</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!-- Footer End -->

					<!-- Subfooter Start -->
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
						<tr>
							<td>
								<table bgcolor="#f5f5f5" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
									<tr>
										<td>
											<!-- Space -->
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" bgcolor="#eaeaea" height="1">&nbsp;</td></tr>
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
											<table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
												<tr>
													<td align="center" style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">
														Copyright © 2016 <a href="http://myapps.co.zw/info/unscribe" style="color: #3697d9; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif; text-decoration:none;"> Unsubscribe</a>
													</td>
												</tr>
											</table>
											<!-- Space -->
											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
												<tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!-- Subfooter End -->
			

				</td>
			</tr>
		</table>
	</body>
</html>';
return $message;
}


}
