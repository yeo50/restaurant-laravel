   <section class="section" id="menu">
       <div class="container">
           <div class="row">
               <div class="col-lg-4">
                   <div class="section-heading">
                       <h6>Our Menu</h6>
                       <h2>Our selection of cakes with quality taste</h2>
                   </div>
               </div>
           </div>
       </div>
       <div class="menu-item-carousel">
           <div class="col-lg-12">
               <div class="owl-menu-item owl-carousel">
                   @foreach ($foods as $food)
                       <div class="item">
                           <div style="background-image: url({{ asset('storage/' . $food->image) }})" class='card '>

                               <div class="price">
                                   <h6>{{ $food->price }}</h6>
                               </div>
                               <div class='info'>
                                   <h1 class='title'>{{ $food->title }}</h1>
                                   <p class='description'>
                                       {{ $food->description }}
                                   </p>
                                   <div class="main-text-button">
                                       <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                   class="fa fa-angle-down"></i></a></div>
                                   </div>
                               </div>

                           </div>
                           @auth


                               @if (session('message') && session('order_id') == $food->id)
                                   <p class="border border-green-600 px-4 py-2 text-center text-green-500">
                                       {{ session('message') }}</p>
                               @else
                                   <form action="{{ route('carts.store') }}" method="post">
                                       @csrf
                                       <div class="flex  w-full">
                                           <input type="hidden" value="{{ $food->id }}" name="food_id">
                                           <input type="number" min="1" value="1" name="quantity"
                                               class="w-28">
                                           <input type="submit" value="Add to cart"
                                               class=" flex-[1_1_0%] px-4 bg-[#FB5849] text-white
                                   hover:ring hover:ring-inset">

                                       </div>
                                   </form>
                               @endif
                           @endauth
                       </div>
                   @endforeach
               </div>
           </div>
       </div>
   </section>
