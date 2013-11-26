<?php
/**
 *
 * main.php layout
 *
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>

<body>
	<div class="wrapper">

		<div class="header">
			<div class="cabriolet">
				Прокат кабриолета
			</div>
			<div class="phone_block">
				<div class="phone">
					<?php echo $this->content->phone;?>
				</div>
				<div class="order_button" id="order_button"></div>
			</div>			
			<div class="logo">
				<a href="/">
					<img src="/images/logo.png">
				</a>
			</div>
			
			<div class="menu clear">
				<ul>
					<li>
						<a href="#work">КАК МЫ РАБОТАЕМ</a>
					</li>
					<li>
						<a href="#service">НАШИ УСЛУГИ</a>
					</li>
					<li>
						<a href="#about">КОРОТОКО О НАС</a>
					</li>
					<li>
						<a href="#portfolio">ПОРТФОЛИО</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>

		<div class="content">
			
			<div class="gallery">
				<div class="lt_corner white"></div>
				<div class="rt_corner white"></div>
				<div class="b_corner pink"></div>
				<div class="left_arrow"></div>
				<div class="right_arrow"></div>
				<div class="ul_container">
					<ul>
						<?php foreach($this->galleryImages AS $image){ ?>
							<li>
								<img src="<?php echo $image;?>" height="500px" width="1000px">
							</li>
						<?php }?>
					</ul>
				</div>
				
			</div>
			
			<div class="work" id="work">
				<div class="header">- Как мы работаем -</div>
				<ul class="steps">
					<li class="step_1">
						<div class="step_header">1 этап</div>
						<div class="step_text">Обсуждение сценария</div>
					</li>
					<li class="step_2">
						<div class="step_header">2 этап</div>
						<div class="step_text">Определение сроков</div>
					</li>
					<li class="step_3">
						<div class="step_header">3 этап</div>
						<div class="step_text">Заключение договора, внесение предоплаты</div>
					</li>
					<li class="step_4">
						<div class="step_header">4 этап</div>
						<div class="step_text">Подбор фото и видео оператора</div>
					</li>
					<li class="step_5">
						<div class="step_header">5 этап</div>
						<div class="step_text">Проведение мероприятия</div>
					</li>
				</ul>
			</div>
			
			<div class="service" id="service">
				<div class="header">- Наши услуги -</div>
				<ul class="service_list">
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_1.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Организация</div>
						<div class="service_list_item_text">свадебного кортежа</div>
					</li>
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_2.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Прогулки</div>
						<div class="service_list_item_text">на кабриолете</div>
					</li>
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_3.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Фотосессия</div>
						<div class="service_list_item_text">на кабриолете</div>
					</li>
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_4.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Подбор и подготовка</div>
						<div class="service_list_item_text">сценария</div>
					</li>
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_5.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Оформление</div>
						<div class="service_list_item_text">украшения</div>
					</li>
					<li class="item">
						<div class="img_container">
							<img src="/images/service_item_6.jpg">
							<div class="border"></div>
						</div>
						<div class="service_list_item_header">Выбор</div>
						<div class="service_list_item_text">профессионального фото и видео оператора</div>
					</li>
				</ul>
				
			</div>
			
			<div class="about" id="about">
				<div class="lt_corner white"></div>
				<div class="rt_corner white"></div>
				<div class="b_corner white"></div>
				<div class="left_arrow"></div>
				<div class="right_arrow"></div>
				<div class="header">- Коротко о нас -</div>
				<div class="text">
					<p>
						<?php echo $this->content->aboutText;?>
					</p>
				</div>
			</div>
			
			<div class="action">
				<div class="header">- Акция -</div>
				<div class="present"><?php echo $this->content->actionText?></div>
				<div class="right_block">
					<div class="timer_block">
						До конца акции:
						<div class="timer_counter">
							<div class="days">
								<div class="timer_num" id="day1">1</div>
								<div class="timer_num" id="day2">2</div>
								дней
							</div>
							<div class="hours">
								<div class="timer_num" id="hour1">1</div>
								<div class="timer_num" id="hour2">2</div>
								часов
							</div>
							<div class="minuts">
								<div class="timer_num" id="minut1">1</div>
								<div class="timer_num" id="minut2">2</div>
								минут
							</div>
						</div>
					</div>
					
					<div class="action_submit_block clear">
						<div class="input_text_container name">
							<div class="icon"></div>
							<input type="text" name="name" id="action_name" placeholder="Ваше имя" value="">
						</div>
						<div class="input_text_container phone">
							<div class="icon"></div>
							<input type="text" name="phone" id="action_phone" placeholder="Телефон" value="">
						</div>
						<div class="order_button" id="action_button"></div>						
						
					</div>
					
				</div>
			</div>
			
			<div class="portfolio" id="portfolio">
				<div class="header">- Портфолио -</div>
				<div class="item litepink">
					<div class="foto">
						<div class="lt_corner white"></div>
						<div class="rt_corner white"></div>
						<div class="b_corner litepink"></div>
						<img src="/images/portfolio_1.jpg">
					</div>
					<div class="bubble">
						<div class="text">
							<div class="left_quote pink"></div>
							<div class="right_quote pink"></div>
							Спасибо за организацию мероприятия сотрудникам «Веддинг Кар», действительно уникальный сценарий, Спасибо вашей команде за талант и креативность.
						</div>
					</div>
					<div class="author">Оксана и Юрий</div>
				</div>
				<div class="item lilac">
					<div class="foto">
						<div class="lt_corner litepink"></div>
						<div class="rt_corner litepink"></div>
						<div class="b_corner lilac"></div>
						<img src="/images/portfolio_2.jpg">
					</div>
					<div class="bubble">
						<div class="text">
							<div class="left_quote lilac"></div>
							<div class="right_quote lilac"></div>
							Дорогие сотрудники «Веддинг Кар», спасибо вам огромное за то, что сделали нашу сказку былью, воплотили мечты об идеальной свадьбе. Спустя годы нашим гостям и нам будет что вспомнить! 
Все было супер! Спасибо, ребята. Я сама такого не ожидала, коллеги были в приятном ступоре от некоторых задумок. Одним словом, молодцы!
						</div>
					</div>
					<div class="author">Оксана и Юрий</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="logo_block">
				<div class="logo">
					<a href="/">
						<img src="/images/logo.png">
					</a>
				</div>
				<div class="phone"><?php echo $this->content->phone;?></div>
				<div class="email">
					<a href="mailto:<?php echo $this->content->email;?>"><?php echo $this->content->email;?></a>
				</div>
			</div>
			<div class="send_mail_block">
				<div class="input_text_container name big">
					<div class="icon"></div>
					<input type="text" name="name" id="footer_name" placeholder="Ваше имя" value="">
				</div>
				<div class="input_text_container phone big">
					<div class="icon"></div>
					<input type="text" name="phone" id="footer_phone" placeholder="Телефон" value="">
				</div>
				<div class="input_textarea_container">
					<textarea id="footer_text" placeholder="Текст письма"></textarea>
				</div>
				<div class="send_mail_button" id="footer_button"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

	</div>
	
	<script src="/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		var Gallery = function () {
	
		    return {

				count : 0,
				active : 0,
				ul : false,
			    
		        //main function to initiate the module
		        init: function (tag) {

		        	this.ul = $(".gallery ul").eq(0);
		            this.count = this.ul.find("li").length;
		            self = this;
		            $(".gallery .left_arrow").on("click", function(){self.prev()});
		            $(".gallery .right_arrow").on("click", function(){self.next()});
		            
		        },
	        	next: function() {
					if (this.active != this.count - 1)
						this.active++;
					else 
						this.active = 0;

					this.ul.animate({left: "-" + 1000 * this.active})
	        	},
	        	prev: function() {
	        		if (this.active != 0)
	        			this.active--;
					else 
						this.active = this.count - 1;

	        		this.ul.animate({left: "-" + 1000 * this.active})
	        	}
	
		    };
	
		}();

		var actionEndDate = new Date(<?php echo $this->content->actionDateEnd[2]?>,
									<?php echo $this->content->actionDateEnd[1] - 1?>,
									<?php echo $this->content->actionDateEnd[0]?>,
									<?php echo $this->content->actionTimeEnd[0]?>,
									<?php echo $this->content->actionTimeEnd[1]?>,
									<?php echo $this->content->actionTimeEnd[2]?>
				);

		var Timer = function() {
			var nowDate = new Date();
			var timeLast = (actionEndDate - nowDate) / 1000;
			var days = (parseInt(timeLast / (60 * 60 * 24))).toString();
			var hours = (parseInt((timeLast / (60 * 60))) % 24).toString();
			var minuts = (parseInt((timeLast / (60))) % 60).toString();

			days = days.length == 1 ? "0" + days : days;
			hours = hours.length == 1 ? "0" + hours : hours;
			minuts = minuts.length == 1 ? "0" + minuts : minuts;

			$("#day1").html(days[0]);
			$("#day2").html(days[1]);
			$("#hour1").html(hours[0]);
			$("#hour2").html(hours[1]);
			$("#minut1").html(minuts[0]);
			$("#minut2").html(minuts[1]);

		}

		var sendMail = function(name, phone, text) {
			$.ajax({
				url : '/site/sendMail/',
				type : 'POST',
				dataType: 'json',
				data: {
					name: name,
					phone : phone,
					text : text
				},
				success: function(response) {
					alert("Ваша заявка отправлена! В ближайшее время мы свяжемся с Вами!");
				}
			})
		} 

		$(document).ready(function() {
			Gallery.init();

			setInterval(Timer, 1000);
			Timer();

			$("#order_button").on("click", function() {
			    $('#dialog_add_client').modal();
			})

			$("#modal_button").on("click", function() {
				var name = $("#modal_name").val();
				var phone = $("#modal_phone").val();
				var text = $("#modal_text").val();

				if (name && phone) {
					sendMail(name, phone, text);
				}
			})

			$("#footer_button").on("click", function() {
				var name = $("#footer_name").val();
				var phone = $("#footer_phone").val();
				var text = $("#footer_text").val();

				if (name && phone) {
					sendMail(name, phone, text);
				}
			})

			$("#action_button").on("click", function() {
				var name = $("#action_name").val();
				var phone = $("#action_phone").val();

				if (name && phone) {
					sendMail(name, phone);
				}
			})
		})
		
	</script>

<div id="dialog_add_client" class="modal hide fade" tabindex="-1" data-width="760" data-height="2000">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<div class="header">Оставить заявку</div>
	</div>
	<div class="modal-body" >
	<div class="send_mail_block">
		<div class="input_text_container name big">
			<div class="icon"></div>
			<input type="text" name="name" id="modal_name" placeholder="Ваше имя" value="">
		</div>
		<div class="input_text_container phone big">
			<div class="icon"></div>
			<input type="text" name="phone" id="modal_phone" placeholder="Телефон" value="">
		</div>
		<div class="clear"></div>
		<div class="input_textarea_container">
			<textarea id="modal_text" placeholder="Текст письма"></textarea>
		</div>
		
		<div class="clear"></div>
	</div>
	</div>
	<div class="modal-footer">
		<div class="send_mail_button pull-right" id="modal_button"></div>
	</div>
</div>
	
</body>
</html>