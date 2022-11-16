



@if (Sentinel::inRole('employee') || Sentinel::inRole('admin'))

    
<li class="{{ Request::is('admin/borrowedItem/borrowedItems*') ? 'active' : '' }}">
    <a href="{!! route('admin.borrowedItem.borrowedItems.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="servers" data-size="18"
               data-loop="true"></i>
               Borrow Items
    </a>
</li>

<li class="{{ Request::is('admin/returnedItem/returnedItems*') ? 'active' : '' }}">
    <a href="{!! route('admin.returnedItem.returnedItems.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="servers" data-size="18"
               data-loop="true"></i>
               Returned Items
    </a>
</li>
@endif
@if (Sentinel::inRole('headofstore')|| Sentinel::inRole('storekeeper')
|| Sentinel::inRole('fixed') || Sentinel::inRole('consumable') ||
Sentinel::inRole('admin') || Sentinel::inRole('department')| Sentinel::inRole('datamanager'))

    
<li class="{{ Request::is('admin/requestedItem/requetedItems*') ? 'active' : '' }}">
    <a href="{!! route('admin.requestedItem.requetedItems.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="paper-plane" data-size="18"
               data-loop="true"></i>
               RequetedItems
    </a>
</li>


<li class="{{ Request::is('admin/transaction/transactions*') ? 'active' : '' }}">
    <a href="{!! route('admin.transaction.transactions.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="desktop" data-size="18"
               data-loop="true"></i>
               Transactions
    </a>
</li>


@endif

@if (Sentinel::inRole('headofstore') || Sentinel::inRole('admin'))


<li class="{{ Request::is('admin/itemsList/itemlists*') ? 'active' : '' }}">
    <a href="{!! route('admin.itemsList.itemlists.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="list" data-size="18"
               data-loop="true"></i>
               Item lists
    </a>
</li>

<li class="{{ Request::is('admin/store/stores*') ? 'active' : '' }}">
    <a href="{!! route('admin.store.stores.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="servers" data-size="18"
               data-loop="true"></i>
               Stores
    </a>
</li>

<li class="{{ Request::is('admin/item/items*') ? 'active' : '' }}">
    <a href="{!! route('admin.item.items.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="list" data-size="18"
               data-loop="true"></i>
               Items
    </a>
</li>

<li class="{{ Request::is('admin/itemUnits/itemUnits*') ? 'active' : '' }}">
    <a href="{!! route('admin.itemUnits.itemUnits.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="list" data-size="18"
               data-loop="true"></i>
               Item Units
    </a>
</li>

<li class="{{ Request::is('admin/itemCategory/itemCategors*') ? 'active' : '' }}">
    <a href="{!! route('admin.itemCategory.itemCategors.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="list" data-size="18"
               data-loop="true"></i>
               Item Categors
    </a>
</li>


<li class="{{ Request::is('admin/invertory/inventories*') ? 'active' : '' }}">
    <a href="{!! route('admin.invertory.inventories.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="servers" data-size="18"
               data-loop="true"></i>
               Inventories
    </a>
</li>



@endif
@if (Sentinel::inRole('inspection') || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/inspectionTeam/inspectionTeams*') ? 'active' : '' }}">
    <a href="{!! route('admin.inspectionTeam.inspectionTeams.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="user" data-size="18"
               data-loop="true"></i>
               InspectionTeams
    </a>
</li>
 
@endif


