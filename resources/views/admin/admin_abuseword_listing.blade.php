@include('admin_header')

<div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
         <h1>Chat Abuse Words</h1>
          <form action="/u/abusewordlistingpost" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Language</label>

            
           <select id="language"  class="form-control" name="language">
   <option value="Tagalog">Tagalog</option>
   <option value="English">English</option>
</select>
            </div>

            <div class="form-group">
              <label>Word</label>
              <input type="text" class="form-control" name="word" placeholder="Enter word.">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>

      <div class="row" style="margin-top: 50px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Language</th> 
                    <th>Word</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                 <tbody>
                    @foreach($data as $da)
                    <tr> 
                      <td>{{ $da->language }}</td> 
                      <td>{{ $da->word }}</td>
                      <td><a href="/u/delabuseword/{{ $da->id }}" class="btn btn-danger btn block">Delete</a></td>
                    </tr> 
                    @endforeach
                    

                       
                 </tbody>
                  <tfoot>
                  <tr>
                  <th>Language</th> 
                    <th>Word</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
        </div>
        <div class="col-md-2"></div>
      </div>
  </div>


