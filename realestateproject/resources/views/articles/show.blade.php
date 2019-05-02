@extends ('layouts.south')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
@section ('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(/images/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">PROPERTY</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
      <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Single Listings Slides -->
                    <div class="single-listings-sliders owl-carousel">
                        <!-- Single Slide -->
                        <img src="/storage/cover_image/{{$article->cover_image}}" alt="">
                        <!-- Single Slide -->
                        <img src="/images/bg-img/hero5.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="listings-content">
                        <!-- Price -->
                        <div class="list-price">
                            <p>${{$article->price}}</p>
                        </div>
                        <h5>Town house with Modern Architecture</h5>
                        <p class="location"><img src="/images/icons/location.png" alt="">{{$article->location}}</p>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
                        <!-- Meta -->
                        <div class="property-meta-data d-flex align-items-end">
                            <div class="new-tag">
                                <img src="/images/icons/new.png" alt="">
                            </div>
                            <div class="bathroom">
                                <img src="/images/icons/bathtub.png" alt="">
                                <span>2</span>
                            </div>
                            <div class="garage">
                                <img src="/images/icons/garage.png" alt="">
                                <span>2</span>
                            </div>
                            <div class="space">
                                <img src="/images/icons/space.png" alt="">
                                <span>120 sq ft</span>
                            </div>
                        </div>
                        <!-- Core Features -->
                        <ul class="listings-core-features d-flex align-items-center">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Gated Community</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Automatic Sprinklers</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Ocean Views</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Private Patio</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Beach Access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Rooftop Terrace</li>
                        </ul>
                       
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                            <img src="/storage/cover_image/{{$article->user->cover_image}}" alt="">
                            <div class="realtor---info">
                                <h2>{{$article->user->name}}</h2>
                                <p>Realtor</p>
                                <h6><img src="/images/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                                <h6><img src="/images/icons/envelope.png" alt=""> {{$article->user->email}}</h6>
                            </div>
                            <div class="realtor--contact-form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="realtor-name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="realtor-number" placeholder="Your Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="enumber" class="form-control" id="realtor-email" placeholder="Your Mail">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="realtor-message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn south-btn">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                  <div class="comments-area">
                        <h5>4 Comments</h5>
                        <ol id="comments_ol">
                            <!-- Single Comment Area -->
                          @forelse($comments as $comment)
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                       <img  src="/storage/cover_image/{{$comment->user->cover_image}}" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <a href="#" class="comment-author-name">{{$comment->user->name}}</a> |
                                            <a href="#" class="comment-date">{{$comment->created_at}}</a> |
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                        <p>{{$comment->type}}</p>
                                    </div>
                                </div>
                            </li>
                             @empty
                                no comments.
                             @endforelse
                        </ol>
                    </div>

             <!-- Leave A Comment -->
                    <div class="leave-comment-area mt-70 clearfix">
                        <div class="comment-form">
                            <h5>Leave a comment</h5>

                            <!-- Comment Form -->
                            <form method="post" id="comment-form">
                                {{csrf_field()}}
                               <input type="hidden" name="article_id" value="{{ $article->id }}" /> 
                                <div class="form-group">
                                    <textarea class="form-control" name="type" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                
                                <input type="submit" value="Submit Reply" class="btn south-btn">
                            </form>
                        </div>
                    </div>
        </div>
    </section>

<script >
    $(document).ready(function(){
    $('#comment-form').on('submit',function(event){
            $("#comments_ol").empty();
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{route('commentadd')}}",
                method:'POST',
                data:form_data,
                dataType:'json',
                success:function(data)
                {
                     $.each(data, function(i, obj){
                        console.log(obj.user);

                            document.getElementById("comments_ol").innerHTML += 

                            '<li class="single_comment_area"><div class="comment-wrapper d-flex"><!-- Comment Meta --><div class="comment-author"><img  src="/storage/cover_image/'+obj.cover_image+'" alt=""></div><!-- Comment Content --><div class="comment-content"><div class="comment-meta"><a href="#" class="comment-author-name">'+obj.user_name+'</a> |<a href="#" class="comment-date">'+obj.created_at+'</a> |<a href="#" class="comment-reply">Reply</a></div><p>'+obj.type+'</p></div></div></li>'


                        ;



                    });
                }
            })
    }); 



});
</script>
@endsection