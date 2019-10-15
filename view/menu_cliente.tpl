<h4 class="text-center text-danger"> Hi <b>{$USER}</b>, welcome!</h4> 


<form id="client" name="client" method="POST" action="">
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="inputDate">
      </div>
      <div class="form-group col-md-4">
        <label for="selectAction">Action</label>
        <select id="selectAction" class="form-control" name="selectAction">
          <option selected="selected">Choose</option>
          <option>Deposit</option>
          <option>Transfer</option>
          <option>Withdraw</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <br>
        <button class="btn btn-success btn-rounded btn" type="submit" id="submitBtn">Search</button>
      </div>
      <br>
  </div>
</form>


<section class="container-fluid">
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">ID User</th>
        <th scope="col">Action</th>
        <th scope="col">ID Action</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$GET_HISTORIC key=i item=H}
      
      {if $H.action eq "Deposit"}
      <tr class="bg-success">
        {elseif $H.action eq "Transfer"}
        <tr class="bg-info">
        {else}
        <tr class="bg-warning">
      {/if}

        <th scope="row"> {$H.idHistoric} </th>
        <td> {$H.idUser} </td>
        <td> {$H.action} </td>
        <td> {$H.idAction} </td>
        <td> {$H.date} </td>
      </tr>
      {/foreach}
    </tbody>
  </table>

</section>