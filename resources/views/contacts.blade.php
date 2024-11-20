@extends('main')

@section('title', 'Контакты -  SochiRentCar')
@section('description', 'Контактные данные компании SochiRentCar')

@section('content')
		<div class="contact-block container">
			<div class="left">
				<header>Офис</header>
				<section>улица Мира, 42, оф. 310, Сочи, Краснодарский край, 354375</section>
				<section>
					Номер телефона
					<a class="phone" href="tel:+79789094140">+7 (978) 909-41-40</a>
					<span>ежедневно с 8:00 до 20:00</span>
				</section>
				<section>
					Вопросы и предложения
					<a href="info@sochirentacar.su">info@sochirentacar.su</a>
				</section>
			</div>
			<div class="middle">
				<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aaa7cd9c42fd6f43bdb9c59de257f41ecc169fd6d7824c89ac497bf2c9d6b1c74&amp;source=constructor" width="100%" height="450" frameborder="0"></iframe>
			</div>
			{{--<div class="right">
				<header>Реквизиты</header>
				<section>
					<span>Название компании</span>
					ООО "РентРайд"
				</section>
				<section>
					<span>ИНН</span>
					7725322745
				</section>
				<section>
					<span>КПП</span>
					772501001
				</section>
				<section>
					<span>ОГРН</span>
					1167746639983
				</section>
				<section>
					<span>БИК</span>
					044525360
				</section>
				<section>
					<span>Корреспондентский счёт</span>
					30101810445250000360
				</section>
				<section>
					<span>Расчетный счет</span>
					40702810200080540763
					в филиал «Корпоративный» ПАО «Совкомбанк» г. Москва
				</section>
			</div>--}}
		</div>
@endsection