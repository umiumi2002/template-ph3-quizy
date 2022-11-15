<form action="{{ route('admin.update.sortPrefecture') }}" method="POST">
    @csrf
      <ul class="sortable">
         @foreach($prefectures as $prefecture)
          <li id="{{ $prefecture->id}}">{{ $prefecture->name }}</li>
         @endforeach
       </ul>
      <input type="hidden" id="list-ids" name="listIds" />
      <button type="submit" id="submit"  class="btn btn-success">更新</button>
      {{-- class見た目× --}}
  </form>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
    'use strict'
  $(function() {
    $(".sortable").sortable();
    $(".sortable").disableSelection();
    $("#submit").click(function() {
        var listIds = $(".sortable").sortable("toArray");
        $("#list-ids").val(listIds);
        $("form").submit();
      });
    });
    </script>

  
