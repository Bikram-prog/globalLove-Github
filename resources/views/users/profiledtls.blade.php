@include('header')
<style type="text/css">
  :focus{
  outline:none;
}
input[type=checkbox]{
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:4px solid #ccc;
  border-top-color:#bbb;
  border-left-color:#bbb;
  background:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
}
input[type=checkbox]:selected{
  border:20px solid #4099ff;
  color: red !important;
  background-color: green !important;
}

.form-group {
	font-size: 20px !important;
}
hr {
    border: 2px solid #888 !important;
    margin-top: 0;
    margin-bottom: 10px;
  }
</style>

<div class="container-fluid" style="margin-top: 15px;">
<div class="row">

    <div class="col-md-1"></div>
    <div class="col-md-10">
<h1>Edit Hobbies & Interests</h1>
<p>Let others know what your interests are and help us connect you with other users that may have similar interests.<br> Answer all questions below to complete this step.</p>

<form action= "/profiledetailsaction" method="POST">
    {{ csrf_field() }}
    @if (Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif

    <div class="form-group">
<p>What do you do for fun / entertainment?</p>

    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="All" <?php echo (in_array('All', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> All
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Antiques" <?php echo (in_array('Antiques', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Antiques
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Art / Painting" <?php echo (in_array('Art / Painting', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Art / Painting
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Astrology" <?php echo (in_array('Astrology', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Astrology
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Ballet" <?php echo (in_array('Ballet', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Ballet
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Bars / Pubs / Nightclubs" <?php echo (in_array('Bars / Pubs / Nightclubs', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Bars / Pubs / Nightclubs </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Beach / Parks" <?php echo (in_array('Beach / Parks', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Beach / Parks
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Board / Card Games" <?php echo (in_array('Board / Card Games', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Board / Card Games
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Camping / Nature" <?php echo (in_array('Camping / Nature', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Camping / Nature
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Cars / Mechanics" <?php echo (in_array('Cars / Mechanics', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Cars / Mechanics
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Art / Painting" <?php echo (in_array('Art / Painting', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Art / Painting
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Casino / Gambling" <?php echo (in_array('Casino / Gambling', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Casino / Gambling
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Collecting" <?php echo (in_array('Collecting', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Collecting
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Comedy Clubs" <?php echo (in_array('Comedy Clubs', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Comedy Clubs
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Computers / Internet" <?php echo (in_array('Computers / Internet', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Computers / Internet
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Concerts / Live Music" <?php echo (in_array('Concerts / Live Music', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Concerts / Live Music
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Cooking / Food and Wine" <?php echo (in_array('Cooking / Food and Wine', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Cooking / Food and Wine
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Crafts" <?php echo (in_array('Crafts', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Crafts
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Dancing" <?php echo (in_array('Dancing', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Dancing
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Dining Out" <?php echo (in_array('Dining Out', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Dining Out
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Dinner Parties" <?php echo (in_array('Dinner Parties', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Dinner Parties
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Education" <?php echo (in_array('Education', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Education
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Family" <?php echo (in_array('Family', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Family
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Fashion Events" <?php echo (in_array('Fashion Events', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Fashion Events
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Gardening / Landscaping" <?php echo (in_array('Gardening / Landscaping', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Gardening / Landscaping
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Home Improvement" <?php echo (in_array('Home Improvement', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Home Improvement
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Investing / Finance" <?php echo (in_array('Investing / Finance', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Investing / Finance
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Karaoke / Sing-along" <?php echo (in_array('Karaoke / Sing-along', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Karaoke / Sing-along
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Library" <?php echo (in_array('Library', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Library
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Meditation" <?php echo (in_array('Meditation', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Meditation
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Motorcycles" <?php echo (in_array('Motorcycles', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Motorcycles
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Movies / Cinema" <?php echo (in_array('Movies / Cinema', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Movies / Cinema
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Museums / Galleries" <?php echo (in_array('Museums / Galleries', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Museums / Galleries
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Music (Listening)" <?php echo (in_array('Music (Listening)', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Music (Listening)
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Music (Playing)" <?php echo (in_array('Music (Playing)', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Music (Playing)
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="News / Politics" <?php echo (in_array('News / Politics', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> News / Politics
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Pets" <?php echo (in_array('Pets', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Pets
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Philosophy / Spirituality" <?php echo (in_array('Philosophy / Spirituality', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Philosophy / Spirituality
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Photography" <?php echo (in_array('Photography', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Photography
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Poetry" <?php echo (in_array('Poetry', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Poetry
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Reading" <?php echo (in_array('Reading', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Reading
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Science and Technology" <?php echo (in_array('Science and Technology', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Science and Technology
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Shopping" <?php echo (in_array('Shopping', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Shopping
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Social Causes / Activism" <?php echo (in_array('Social Causes / Activism', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Social Causes / Activism
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="TV: Educational / News" <?php echo (in_array('TV: Educational / News', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> TV: Educational / News
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="TV: Entertainment" <?php echo (in_array('TV: Entertainment', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> TV: Entertainment
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Theatre" <?php echo (in_array('Theatre', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Theatre
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Traveling" <?php echo (in_array('Traveling', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Traveling
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Video / Online Games" <?php echo (in_array('Video / Online Games', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Video / Online Games
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Volunteering" <?php echo (in_array('Volunteering', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Volunteering
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Watching Sports" <?php echo (in_array('Watching Sports', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Watching Sports
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Wine Tasting" <?php echo (in_array('Wine Tasting', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Wine Tasting
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Writing" <?php echo (in_array('Writing', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Writing
    <input style="margin-left: 5px;" type="checkbox" name="entertnmnt[]" value="Other" <?php echo (in_array('Other', explode(',', $hobby[0]->entertainment)) ? 'checked' : ''); ?>> Other
   </div>
   <hr>

   <div class="form-group">
       <p>What sort of food do you like?</p>
        <input style="margin-left: 5px;" type="checkbox" name="food[]" value="All" <?php echo (in_array('All', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> All
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="American" <?php echo (in_array('American', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> American
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Barbecue" <?php echo (in_array('Barbecue', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Barbecue
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Cajun / Southern" <?php echo (in_array('Cajun / Southern', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Cajun / Southern
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="California-Fusion" <?php echo (in_array('California-Fusion', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> California-Fusion
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Caribbean/Cuban" <?php echo (in_array('Caribbean/Cuban', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Caribbean/Cuban
     </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Chinese / Dim Sum" <?php echo (in_array('Chinese / Dim Sum', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Chinese / Dim Sum
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Continental" <?php echo (in_array('Continental', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Continental
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Deli" <?php echo (in_array('Deli', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Deli
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Eastern European" <?php echo (in_array('Eastern European', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Eastern European
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Fast Food / Pizza" <?php echo (in_array('Fast Food / Pizza', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Fast Food / Pizza
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="French" <?php echo (in_array('French', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> French
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="German" <?php echo (in_array('German', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> German
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Greek" <?php echo (in_array('Greek', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Greek
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Indian" <?php echo (in_array('Indian', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Indian
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Italian" <?php echo (in_array('Italian', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Italian
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Japanese / Sushi" <?php echo (in_array('Japanese / Sushi', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Japanese / Sushi
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Jewish / Kosher" <?php echo (in_array('Jewish / Kosher', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Jewish / Kosher
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Korean" <?php echo (in_array('Korean', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Korean
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Mediterranean" <?php echo (in_array('Mediterranean', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Mediterranean
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Mexican" <?php echo (in_array('Mexican', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Mexican
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Middle Eastern" <?php echo (in_array('Middle Eastern', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Middle Eastern
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Seafood" <?php echo (in_array('Seafood', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Seafood
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Soul Food" <?php echo (in_array('Soul Food', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Soul Food
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="South American" <?php echo (in_array('South American', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> South American / Landscaping
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Southwestern" <?php echo (in_array('Southwestern', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Southwestern
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Thai" <?php echo (in_array('Thai', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Thai
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Vegan" <?php echo (in_array('Vegan', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Vegan
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Vegetarian / Organic" <?php echo (in_array('Vegetarian / Organic', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Vegetarian / Organic
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Vietnamese" <?php echo (in_array('Vietnamese', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Vietnamese
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="food[]" value="Other" <?php echo (in_array('Other', explode(',', $hobby[0]->food)) ? 'checked' : ''); ?>> Other

   </div>
   <hr>

   <div class="form-group">
       <p>What sort of music are you into??</p>
        <input style="margin-left: 5px;" type="checkbox" name="music[]" value="All" <?php echo (in_array('All', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> All
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Alternative" <?php echo (in_array('Alternative', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Alternative
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Classical / Opera" <?php echo (in_array('Classical / Opera', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Classical / Opera
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Country / Folk" <?php echo (in_array('Country / Folk', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Country / Folk
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Dance / Techno" <?php echo (in_array('Dance / Techno', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Dance / Techno
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Jazz / Blues" <?php echo (in_array('Jazz / Blues', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Jazz / Blues
     </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Metal" <?php echo (in_array('Metal', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Metal
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="New Age" <?php echo (in_array('New Age', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> New Age
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Pop" <?php echo (in_array('Pop', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Pop
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="R'n'B / Hip Hop" <?php echo (in_array("R'n'B / Hip Hop", explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> R'n'B / Hip Hop
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Rap" <?php echo (in_array('Rap', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Rap
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Reggae" <?php echo (in_array('Reggae', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Reggae
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Religious" <?php echo (in_array('Religious', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Religious
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Rock" <?php echo (in_array('Rock', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Rock
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Soft Rock" <?php echo (in_array('Soft Rock', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Soft Rock
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="World" <?php echo (in_array('World', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> World
    <input style="margin-left: 5px;" type="checkbox" name="music[]" value="Other" <?php echo (in_array('Other', explode(',', $hobby[0]->music)) ? 'checked' : ''); ?>> Other
    </div>
    <hr>
    <div class="form-group">
       <p>What sports do you play or like to watch?</p>
        <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="All" <?php echo (in_array('All', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> All
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Aerobics" <?php echo (in_array('Aerobics', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Aerobics
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="American Football" <?php echo (in_array('American Football', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> American Football
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Archery" <?php echo (in_array('Archery', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Archery
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Athletics" <?php echo (in_array('Athletics', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Athletics
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Aussie Rules Football" <?php echo (in_array('Aussie Rules Football', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Aussie Rules Football
     </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Auto Racing" <?php echo (in_array('Auto Racing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Auto Racing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="BMX / Mountain Biking" <?php echo (in_array('BMX / Mountain Biking', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> BMX / Mountain Biking
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Baseball / Softball" <?php echo (in_array('Baseball / Softball', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Baseball / Softball
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Basketball" <?php echo (in_array('Basketball', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Basketball
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Biking" <?php echo (in_array('Biking', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Biking
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Boating / Sailing" <?php echo (in_array('Boating / Sailing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Boating / Sailing
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Bodybuilding" <?php echo (in_array('Bodybuilding', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Bodybuilding
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Bowling" <?php echo (in_array('Bowling', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Bowling
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Boxing" <?php echo (in_array('Boxing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Boxing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Canoe / Kayak" <?php echo (in_array('Canoe / Kayak', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Canoe / Kayak
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="CAlloning / Caving" <?php echo (in_array('CAlloning / Caving', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> CAlloning / Caving
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Cricket" <?php echo (in_array('Cricket', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Cricket
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Cycling" <?php echo (in_array('Cycling', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Cycling
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Darts" <?php echo (in_array('Darts', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Darts
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Diving" <?php echo (in_array('Diving', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Diving
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Extreme Sports" <?php echo (in_array('Extreme Sports', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Extreme Sports
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Figure Skating" <?php echo (in_array('Figure Skating', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Figure Skating
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Fishing" <?php echo (in_array('Fishing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Fishing
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Golf" <?php echo (in_array('Golf', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Golf
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Gym / Weight Training" <?php echo (in_array('Gym / Weight Training', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Gym / Weight Training
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Gymnastics" <?php echo (in_array('Gymnastics', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Gymnastics
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Hang Gliding / Paragliding" <?php echo (in_array('Hang Gliding / Paragliding', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Hang Gliding / Paragliding
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Hiking" <?php echo (in_array('Hiking', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Hiking
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Hockey" <?php echo (in_array('Hockey', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Hockey
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Horse Riding" <?php echo (in_array('Horse Riding', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Horse Riding
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Hunting / Shooting" <?php echo (in_array('Hunting / Shooting', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Hunting / Shooting
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Ice Skating / Ice Hockey" <?php echo (in_array('Ice Skating / Ice Hockey', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Ice Skating / Ice Hockey
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Jet / Water Skiing" <?php echo (in_array('Jet / Water Skiing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Jet / Water Skiing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Jogging / Running" <?php echo (in_array('Jogging / Running', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Jogging / Running
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Reggae" <?php echo (in_array('Reggae', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Reggae
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Lacrosse" <?php echo (in_array('Lacrosse', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Lacrosse
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Martial Arts" <?php echo (in_array('Martial Arts', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Martial Arts
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Motor Sports" <?php echo (in_array('Motor Sports', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Motor Sports
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Mountain / Rock Climbing" <?php echo (in_array('Mountain / Rock Climbing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Mountain / Rock Climbing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Netball" <?php echo (in_array('Netball', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Netball
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Parachuting / BASE Jumping" <?php echo (in_array('Parachuting / BASE Jumping', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Parachuting / BASE Jumping
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Polo" <?php echo (in_array('Polo', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Polo
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Pool / Billards" <?php echo (in_array('Pool / Billards', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Pool / Billards
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Rowing" <?php echo (in_array('Rowing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Rowing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Rugby" <?php echo (in_array('Rugby', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Rugby
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Scuba Diving / Snorkeling" <?php echo (in_array('Scuba Diving / Snorkeling', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Scuba Diving / Snorkeling
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Skateboarding" <?php echo (in_array('Skateboarding', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Skateboarding
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Skiing / Snowboarding" <?php echo (in_array('Skiing / Snowboarding', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Skiing / Snowboarding
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Snowmobiling" <?php echo (in_array('Snowmobiling', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Snowmobiling
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Soccer" <?php echo (in_array('Soccer', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Soccer
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Squash / Racquetball" <?php echo (in_array('Squash / Racquetball', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Squash / Racquetball
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Surfing" <?php echo (in_array('Surfing', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Surfing
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Swimming" <?php echo (in_array('Swimming', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Swimming
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Table Tennis" <?php echo (in_array('Table Tennis', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Table Tennis
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Tennis / Badminton" <?php echo (in_array('Tennis / Badminton', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Tennis / Badminton
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Volleyball" <?php echo (in_array('Volleyball', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Volleyball
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Walking" <?php echo (in_array('Walking', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Walking
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Wrestling" <?php echo (in_array('Wrestling', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Wrestling
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Yoga / Pilates" <?php echo (in_array('Yoga / Pilates', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Yoga / Pilates
    </div>
    <div class="form-group">
    <input style="margin-left: 5px;" type="checkbox" name="sports[]" value="Other" <?php echo (in_array('Other', explode(',', $hobby[0]->sports)) ? 'checked' : ''); ?>> Other
    </div>
    <hr>

    <button style=" 
margin: 0 auto;
display: flex;
justify-content: center;
align-items: center;
align-content: center;
width: 120px;
font-size: 18px;
letter-spacing: 2.0px;
" onclick="search()" type="submit" class="btn btn-primary mb-4">SAVE</button>
   

</form>
</div>
<div class="col-md-1"></div>
</div>
</div>


@include('footer')