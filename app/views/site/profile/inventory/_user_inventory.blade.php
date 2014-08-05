<!--This is the contents of Inventory page-->
<div class="search_box search">
  <form class="navbar-form navbar-left" role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder=" search inventory ">
    </div>
    <button type="submit" class="btn btn-search "> <i class="fa fa-search"></i></button>
  </form>
</div> 
<br>
<div style="position: relative">
  <p>You have borrowed {{count($useritems)}} items. 
    
    <!-- Count the items that are overdued -->
    @foreach($useritems as $useritem)
      @if($today > $useritem->due_at)
      <?php $dueitemcount = $dueitemcount + 1 ?>
      @endif
    @endforeach
    
    <!-- Echo the number of items + message -->
    @if($dueitemcount > 0)
      <span style = "color: red">{{$dueitemcount}}</span> 
      
      <!-- is or are? -->
      @if($dueitemcount > 1)
      are 
      @else
      is 
      @endif
      
      <span style = "color: red">overdue</span>. </p>
    @else

    @endif
</div>
 <!--This is the inventory table of Inventory page-->
<div class="item_table table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Borrowed date</th>
          <th>Due date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($useritems as $useritem)
          @foreach($items as $item)
            @if($useritem->item_id == $item->id)
              <tr>
                <td><a href="/{{$item->image}}">{{$item->name}}</a></td>
                <td>{{$useritem->quantity}}</td>
                <td>{{$useritem->created_at}}</td>
                <td>{{$useritem->due_at}}</td>
                @if($useritem->due_at == $today)
                  <td class="caution">due today</td>
                @elseif($useritem->due_at > $today)
                  <td>onloan</td>
                @else
                  <td class="danger">overdue</td>
                @endif
              </tr>
            @endif
          @endforeach
        @endforeach
      </tbody>
    </table>

</div>