@extends('layouts.base')

@section('title', 'Оформление заказа')

@section('content')
   <div class="orderdetails">
      <form action="{{ route('order.buy') }}" method="POST">
            @csrf
            <div class="title">Оформление заказа</div>
            <span class="subtitle">Способ получения</span>
            <div class="tabs">
               <div class="tab active" title="Самовывоз">
                  <input type="hidden" name="deliverymethod" value="Самовывоз">
               </div>
               <div class="tab" title="Доставка">
                  <p>
                     <label for="address">Адрес</label>
                     <input type="text" name="address" id="address" class="input b" placeholder="Введите адрес" value="{{old('address') ?? ''}}" required>
                     <input type="hidden" name="deliverymethod" value="Доставка">
                  </p>
               </div>
            </div>
            <br/><span class="subtitle">Данные покупателя</span>
            <p>
               <label for="fullname">ФИО</label>
               <input type="text" name="fullname" id="fullname" class="input b" placeholder="Введите псевдоним" value="{{old('fullname') ?? ''}}" required>
            </p>
            <p>
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="input b" placeholder="Введите Email" value="{{old('email') ?? ''}}" required>
            </p>
            <p>
               <label for="telephone">Телефон</label>
               <input type="text" name="telephone" id="telephone" class="input b" placeholder="Введите псевдоним" value="{{old('telephone') ?? ''}}" required>
            </p>
            <br/><span class="subtitle">Способ оплаты</span>
            <div class="tabs">
               <div class="tab active" title="При получение">
                  <input type="hidden" name="paymethod" value="При получение">
               </div>
               <div class="tab" title="Онлайн">
                  <input type="hidden" name="paymethod" value="Онлайн">
                  <input type="hidden" name="paystatus" value="1">
               </div>
            </div>
            <br/><span class="subtitle">Итого: {{$total}} руб.</span>
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit" class="button">Подтвердить</button>
       </form>
   </div>
@endsection
