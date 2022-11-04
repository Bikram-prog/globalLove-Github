@include('admin_header')

<div class="container-fluid">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
         <h1>Country Pricing</h1>
          <form action="/u/admintextpost" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Text</label>
              <input type="text" class="form-control" name="text" placeholder="Enter text.">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>

      <div class="row" style="margin-top: 50px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-striped table-bordered">
                <tr>
                    <td style="color: #f15052; font-weight: 700;">Current Text</td>
                    <td style="font-weight: 700;">{{ $data[0]->ad_text }}</td>
                </tr>
                </table>
        </div>
        <div class="col-md-2"></div>
      </div>
  </div>



@include('footer')