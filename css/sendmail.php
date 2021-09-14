<?php 
		$header = "From: Helpdesk Service <thitika.42@gmail.com>\r\n";
		//$header .= "Cc: ".$email_cc."\r\n";
		$header .= "Bcc: thitika.42@gmail.com\r\n";
		$header .= "Content-Type: text/html; charset=utf-8\r\n";
		$to = "pmtk_thitika@hotmail.com";
		$subject = '=?utf-8?B?'.base64_encode("B/G Expire Date").'?=';
		$body = "หนังสือค้ำประกันหมดอายุ
		<br><br>
			<table width='100%' border='0' align='center' style='border-collapse:collapse;font-size:100%' bordercolor='#000000'>
				<tr>
					<td align='left'>
						<table border='1' align='left' style='border-collapse:collapse;font-size:100%' bordercolor='#000000'>
							<tr>
								<td bgcolor='#92d050'>&nbsp;Category</td>
								<td bgcolor='#92d050'>&nbsp;Detail</td>
							</tr>
							<tr>
								<td>&nbsp;Date Issued</td>
								<td>&nbsp;".$date_issued."</td>
							</tr>
							<tr>
								<td>&nbsp;Project No.</td>
								<td>&nbsp;".$project_no."</td>
							</tr>
							<tr>
								<td>&nbsp;Project Name</td>
								<td>&nbsp;".$project_name."&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;Owner</td>
								<td>&nbsp;".$owner."&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;Bank</td>
								<td>&nbsp;".$bank."</td>
							</tr>
							<tr>
								<td>&nbsp;B/G No.</td>
								<td>&nbsp;".$bg_no."</td>
							</tr>
							<tr>
								<td>&nbsp;Start Date</td>
								<td>&nbsp;".$start_date."</td>
							</tr>
							<tr>
								<td>&nbsp;Expire Date</td>
								<td>&nbsp;<span style='color:red'>".$expire_date."</span></td>
							</tr>
							<tr>
								<td>&nbsp;Remain</td>
								<td>&nbsp;".$diff." วัน</td>
							</tr>
							<tr>
								<td>&nbsp;Fee</td>
								<td>&nbsp;".number_format($fee, 2, '.', ',')." บาท</td>
							</tr>
							<tr>
								<td>&nbsp;Amount</td>
								<td>&nbsp;".number_format($bg_amount, 2, '.', ',')." บาท</td>
							</tr>
							<tr>
								<td>&nbsp;Type</td>
								<td>&nbsp;".$type."</td>
							</tr>
							<tr>
								<td>&nbsp;Status</td>
								<td>&nbsp;".$status."</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>จดหมายฉบับนี้ส่งจากระบบอัตโนมัติไม่ต้องทำการตอบกลับ";
		$sendmail = mail($to, $subject, $body , $header);

?>
