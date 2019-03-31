@extends ('layouts.app')
@section ('content')

<div class="row">
	<div class="col-md-6 offset-md-3">
	  <div class="card card-body">
	  	<div class="card-header">
            create article
           </div>
           <div class="card-body">
			<form method="POST" action="/articles" enctype="multipart/form-data">
					{{csrf_field()}}

			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >		 <div class="card-body">
				you are logged in 
				{!! Auth::user()->id !!}

			</div>

			 <div class="form-group">
           	  <label for="type">type</label>
              <textarea name="type" class="form-control" ></textarea>
           	 </div>

           	   <div class="form-group">
           	     <label for="rooms">rooms</label>
           	   	 <input type="number" name="rooms" class="form-control" />
           	   </div>

           	    <div class="form-group">
           	   	 <label for="area">area</label>
           	   	 <input type="number" name="area" class="form-control" />
           	    </div>

           	     <div class="form-group">
           	      <label for="location">location</label>
                  <textarea name="location" class="form-control" ></textarea>
           	     </div>

           	      <div class="form-group">
           	   	   <label for="price">price</label>
           	   	   <input type="number" name="price" class="form-control" />
           	      </div>

                  <div>
                    <input type="file" name="cover_image">
                  </div>

           	<input type="submit" class="btn btn-success float-right">

			</form>
           	
           </div>
	  	</div>
	  </div>
	</div>


@endsection