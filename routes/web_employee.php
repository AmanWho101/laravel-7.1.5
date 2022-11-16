<?php
////////employe route




Route::group(array('prefix' => 'employee/itemsList/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.itemsList.'), function () {

Route::get('itemlists', ['as'=> 'itemlists.index', 'uses' => 'Items_List\ItemlistController@index']);
Route::post('itemlists', ['as'=> 'itemlists.store', 'uses' => 'Items_List\ItemlistController@store']);
Route::get('itemlists/create', ['as'=> 'itemlists.create', 'uses' => 'Items_List\ItemlistController@create']);
Route::put('itemlists/{itemlists}', ['as'=> 'itemlists.update', 'uses' => 'Items_List\ItemlistController@update']);
Route::patch('itemlists/{itemlists}', ['as'=> 'itemlists.update', 'uses' => 'Items_List\ItemlistController@update']);
Route::get('itemlists/{id}/delete', ['as' => 'itemlists.delete', 'uses' => 'Items_List\ItemlistController@getDelete']);
Route::get('itemlists/{id}/confirm-delete', ['as' => 'itemlists.confirm-delete', 'uses' => 'Items_List\ItemlistController@getModalDelete']);
Route::get('itemlists/{itemlists}', ['as'=> 'itemlists.show', 'uses' => 'Items_List\ItemlistController@show']);
Route::get('itemlists/{itemlists}/edit', ['as'=> 'itemlists.edit', 'uses' => 'Items_List\ItemlistController@edit']);

});


Route::group(array('prefix' => 'employee/store/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.store.'), function () {

Route::get('stores', ['as'=> 'stores.index', 'uses' => 'Store\StoreController@index']);
Route::post('stores', ['as'=> 'stores.store', 'uses' => 'Store\StoreController@store']);
Route::get('stores/create', ['as'=> 'stores.create', 'uses' => 'Store\StoreController@create']);
Route::put('stores/{stores}', ['as'=> 'stores.update', 'uses' => 'Store\StoreController@update']);
Route::patch('stores/{stores}', ['as'=> 'stores.update', 'uses' => 'Store\StoreController@update']);
Route::get('stores/{id}/delete', ['as' => 'stores.delete', 'uses' => 'Store\StoreController@getDelete']);
Route::get('stores/{id}/confirm-delete', ['as' => 'stores.confirm-delete', 'uses' => 'Store\StoreController@getModalDelete']);
Route::get('stores/{stores}', ['as'=> 'stores.show', 'uses' => 'Store\StoreController@show']);
Route::get('stores/{stores}/edit', ['as'=> 'stores.edit', 'uses' => 'Store\StoreController@edit']);

});


Route::group(array('prefix' => 'employee/item/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.item.'), function () {

Route::get('items', ['as'=> 'items.index', 'uses' => 'Item\ItemController@index']);
Route::post('items', ['as'=> 'items.store', 'uses' => 'Item\ItemController@store']);
Route::get('items/create', ['as'=> 'items.create', 'uses' => 'Item\ItemController@create']);
Route::put('items/{items}', ['as'=> 'items.update', 'uses' => 'Item\ItemController@update']);
Route::patch('items/{items}', ['as'=> 'items.update', 'uses' => 'Item\ItemController@update']);
Route::get('items/{id}/delete', ['as' => 'items.delete', 'uses' => 'Item\ItemController@getDelete']);
Route::get('items/{id}/confirm-delete', ['as' => 'items.confirm-delete', 'uses' => 'Item\ItemController@getModalDelete']);
Route::get('items/{items}', ['as'=> 'items.show', 'uses' => 'Item\ItemController@show']);
Route::get('items/{items}/edit', ['as'=> 'items.edit', 'uses' => 'Item\ItemController@edit']);

});


Route::group(array('prefix' => 'employee/itemUnits/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.itemUnits.'), function () {

Route::get('itemUnits', ['as'=> 'itemUnits.index', 'uses' => 'Item_Units\ItemUnitController@index']);
Route::post('itemUnits', ['as'=> 'itemUnits.store', 'uses' => 'Item_Units\ItemUnitController@store']);
Route::get('itemUnits/create', ['as'=> 'itemUnits.create', 'uses' => 'Item_Units\ItemUnitController@create']);
Route::put('itemUnits/{itemUnits}', ['as'=> 'itemUnits.update', 'uses' => 'Item_Units\ItemUnitController@update']);
Route::patch('itemUnits/{itemUnits}', ['as'=> 'itemUnits.update', 'uses' => 'Item_Units\ItemUnitController@update']);
Route::get('itemUnits/{id}/delete', ['as' => 'itemUnits.delete', 'uses' => 'Item_Units\ItemUnitController@getDelete']);
Route::get('itemUnits/{id}/confirm-delete', ['as' => 'itemUnits.confirm-delete', 'uses' => 'Item_Units\ItemUnitController@getModalDelete']);
Route::get('itemUnits/{itemUnits}', ['as'=> 'itemUnits.show', 'uses' => 'Item_Units\ItemUnitController@show']);
Route::get('itemUnits/{itemUnits}/edit', ['as'=> 'itemUnits.edit', 'uses' => 'Item_Units\ItemUnitController@edit']);

});


Route::group(array('prefix' => 'employee/itemCategory/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.itemCategory.'), function () {

Route::get('itemCategors', ['as'=> 'itemCategors.index', 'uses' => 'Item_Category\ItemCategorController@index']);
Route::post('itemCategors', ['as'=> 'itemCategors.store', 'uses' => 'Item_Category\ItemCategorController@store']);
Route::get('itemCategors/create', ['as'=> 'itemCategors.create', 'uses' => 'Item_Category\ItemCategorController@create']);
Route::put('itemCategors/{itemCategors}', ['as'=> 'itemCategors.update', 'uses' => 'Item_Category\ItemCategorController@update']);
Route::patch('itemCategors/{itemCategors}', ['as'=> 'itemCategors.update', 'uses' => 'Item_Category\ItemCategorController@update']);
Route::get('itemCategors/{id}/delete', ['as' => 'itemCategors.delete', 'uses' => 'Item_Category\ItemCategorController@getDelete']);
Route::get('itemCategors/{id}/confirm-delete', ['as' => 'itemCategors.confirm-delete', 'uses' => 'Item_Category\ItemCategorController@getModalDelete']);
Route::get('itemCategors/{itemCategors}', ['as'=> 'itemCategors.show', 'uses' => 'Item_Category\ItemCategorController@show']);
Route::get('itemCategors/{itemCategors}/edit', ['as'=> 'itemCategors.edit', 'uses' => 'Item_Category\ItemCategorController@edit']);

});


Route::group(array('prefix' => 'employee/borrowedItem/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.borrowedItem.'), function () {

Route::get('borrowedItems', ['as'=> 'borrowedItems.index', 'uses' => 'Borrowed_Item\BorrowedItemController@index']);
Route::post('borrowedItems', ['as'=> 'borrowedItems.store', 'uses' => 'Borrowed_Item\BorrowedItemController@store']);
Route::get('borrowedItems/create', ['as'=> 'borrowedItems.create', 'uses' => 'Borrowed_Item\BorrowedItemController@create']);
Route::put('borrowedItems/{borrowedItems}', ['as'=> 'borrowedItems.update', 'uses' => 'Borrowed_Item\BorrowedItemController@update']);
Route::patch('borrowedItems/{borrowedItems}', ['as'=> 'borrowedItems.update', 'uses' => 'Borrowed_Item\BorrowedItemController@update']);
Route::get('borrowedItems/{id}/delete', ['as' => 'borrowedItems.delete', 'uses' => 'Borrowed_Item\BorrowedItemController@getDelete']);
Route::get('borrowedItems/{id}/confirm-delete', ['as' => 'borrowedItems.confirm-delete', 'uses' => 'Borrowed_Item\BorrowedItemController@getModalDelete']);
Route::get('borrowedItems/{borrowedItems}', ['as'=> 'borrowedItems.show', 'uses' => 'Borrowed_Item\BorrowedItemController@show']);
Route::get('borrowedItems/{borrowedItems}/edit', ['as'=> 'borrowedItems.edit', 'uses' => 'Borrowed_Item\BorrowedItemController@edit']);

});


Route::group(array('prefix' => 'employee/returnedItem/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.returnedItem.'), function () {

Route::get('returnedItems', ['as'=> 'returnedItems.index', 'uses' => 'Returned_Item\ReturnedItemController@index']);
Route::post('returnedItems', ['as'=> 'returnedItems.store', 'uses' => 'Returned_Item\ReturnedItemController@store']);
Route::get('returnedItems/create', ['as'=> 'returnedItems.create', 'uses' => 'Returned_Item\ReturnedItemController@create']);
Route::put('returnedItems/{returnedItems}', ['as'=> 'returnedItems.update', 'uses' => 'Returned_Item\ReturnedItemController@update']);
Route::patch('returnedItems/{returnedItems}', ['as'=> 'returnedItems.update', 'uses' => 'Returned_Item\ReturnedItemController@update']);
Route::get('returnedItems/{id}/delete', ['as' => 'returnedItems.delete', 'uses' => 'Returned_Item\ReturnedItemController@getDelete']);
Route::get('returnedItems/{id}/confirm-delete', ['as' => 'returnedItems.confirm-delete', 'uses' => 'Returned_Item\ReturnedItemController@getModalDelete']);
Route::get('returnedItems/{returnedItems}', ['as'=> 'returnedItems.show', 'uses' => 'Returned_Item\ReturnedItemController@show']);
Route::get('returnedItems/{returnedItems}/edit', ['as'=> 'returnedItems.edit', 'uses' => 'Returned_Item\ReturnedItemController@edit']);

});


Route::group(array('prefix' => 'employee/invertory/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.invertory.'), function () {

Route::get('inventories', ['as'=> 'inventories.index', 'uses' => 'Invertory\InventoryController@index']);
Route::post('inventories', ['as'=> 'inventories.store', 'uses' => 'Invertory\InventoryController@store']);
Route::get('inventories/create', ['as'=> 'inventories.create', 'uses' => 'Invertory\InventoryController@create']);
Route::put('inventories/{inventories}', ['as'=> 'inventories.update', 'uses' => 'Invertory\InventoryController@update']);
Route::patch('inventories/{inventories}', ['as'=> 'inventories.update', 'uses' => 'Invertory\InventoryController@update']);
Route::get('inventories/{id}/delete', ['as' => 'inventories.delete', 'uses' => 'Invertory\InventoryController@getDelete']);
Route::get('inventories/{id}/confirm-delete', ['as' => 'inventories.confirm-delete', 'uses' => 'Invertory\InventoryController@getModalDelete']);
Route::get('inventories/{inventories}', ['as'=> 'inventories.show', 'uses' => 'Invertory\InventoryController@show']);
Route::get('inventories/{inventories}/edit', ['as'=> 'inventories.edit', 'uses' => 'Invertory\InventoryController@edit']);

});


Route::group(array('prefix' => 'employee/requestAproved/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.requestAproved.'), function () {

Route::get('requestAproveds', ['as'=> 'requestAproveds.index', 'uses' => 'Request_Aproved\RequestAprovedController@index']);
Route::post('requestAproveds', ['as'=> 'requestAproveds.store', 'uses' => 'Request_Aproved\RequestAprovedController@store']);
Route::get('requestAproveds/create', ['as'=> 'requestAproveds.create', 'uses' => 'Request_Aproved\RequestAprovedController@create']);
Route::put('requestAproveds/{requestAproveds}', ['as'=> 'requestAproveds.update', 'uses' => 'Request_Aproved\RequestAprovedController@update']);
Route::patch('requestAproveds/{requestAproveds}', ['as'=> 'requestAproveds.update', 'uses' => 'Request_Aproved\RequestAprovedController@update']);
Route::get('requestAproveds/{id}/delete', ['as' => 'requestAproveds.delete', 'uses' => 'Request_Aproved\RequestAprovedController@getDelete']);
Route::get('requestAproveds/{id}/confirm-delete', ['as' => 'requestAproveds.confirm-delete', 'uses' => 'Request_Aproved\RequestAprovedController@getModalDelete']);
Route::get('requestAproveds/{requestAproveds}', ['as'=> 'requestAproveds.show', 'uses' => 'Request_Aproved\RequestAprovedController@show']);
Route::get('requestAproveds/{requestAproveds}/edit', ['as'=> 'requestAproveds.edit', 'uses' => 'Request_Aproved\RequestAprovedController@edit']);

});


Route::group(array('prefix' => 'employee/requestedItem/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.requestedItem.'), function () {

Route::get('requetedItems', ['as'=> 'requetedItems.index', 'uses' => 'Requested_Item\RequetedItemController@index']);
Route::post('requetedItems', ['as'=> 'requetedItems.store', 'uses' => 'Requested_Item\RequetedItemController@store']);
Route::get('requetedItems/create', ['as'=> 'requetedItems.create', 'uses' => 'Requested_Item\RequetedItemController@create']);
Route::put('requetedItems/{requetedItems}', ['as'=> 'requetedItems.update', 'uses' => 'Requested_Item\RequetedItemController@update']);
Route::patch('requetedItems/{requetedItems}', ['as'=> 'requetedItems.update', 'uses' => 'Requested_Item\RequetedItemController@update']);
Route::get('requetedItems/{id}/delete', ['as' => 'requetedItems.delete', 'uses' => 'Requested_Item\RequetedItemController@getDelete']);
Route::get('requetedItems/{id}/confirm-delete', ['as' => 'requetedItems.confirm-delete', 'uses' => 'Requested_Item\RequetedItemController@getModalDelete']);
Route::get('requetedItems/{requetedItems}', ['as'=> 'requetedItems.show', 'uses' => 'Requested_Item\RequetedItemController@show']);
Route::get('requetedItems/{requetedItems}/edit', ['as'=> 'requetedItems.edit', 'uses' => 'Requested_Item\RequetedItemController@edit']);

});



Route::group(array('prefix' => 'employee/headOfStore/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.headOfStore.'), function () {

Route::get('headofStores', ['as'=> 'headofStores.index', 'uses' => 'Head_Of_Store\HeadofStoreController@index']);
Route::post('headofStores', ['as'=> 'headofStores.store', 'uses' => 'Head_Of_Store\HeadofStoreController@store']);
Route::get('headofStores/create', ['as'=> 'headofStores.create', 'uses' => 'Head_Of_Store\HeadofStoreController@create']);
Route::put('headofStores/{headofStores}', ['as'=> 'headofStores.update', 'uses' => 'Head_Of_Store\HeadofStoreController@update']);
Route::patch('headofStores/{headofStores}', ['as'=> 'headofStores.update', 'uses' => 'Head_Of_Store\HeadofStoreController@update']);
Route::get('headofStores/{id}/delete', ['as' => 'headofStores.delete', 'uses' => 'Head_Of_Store\HeadofStoreController@getDelete']);
Route::get('headofStores/{id}/confirm-delete', ['as' => 'headofStores.confirm-delete', 'uses' => 'Head_Of_Store\HeadofStoreController@getModalDelete']);
Route::get('headofStores/{headofStores}', ['as'=> 'headofStores.show', 'uses' => 'Head_Of_Store\HeadofStoreController@show']);
Route::get('headofStores/{headofStores}/edit', ['as'=> 'headofStores.edit', 'uses' => 'Head_Of_Store\HeadofStoreController@edit']);

});


Route::group(array('prefix' => 'employee/departmentHead/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.departmentHead.'), function () {

Route::get('departmentHeads', ['as'=> 'departmentHeads.index', 'uses' => 'Department_Head\DepartmentHeadController@index']);
Route::post('departmentHeads', ['as'=> 'departmentHeads.store', 'uses' => 'Department_Head\DepartmentHeadController@store']);
Route::get('departmentHeads/create', ['as'=> 'departmentHeads.create', 'uses' => 'Department_Head\DepartmentHeadController@create']);
Route::put('departmentHeads/{departmentHeads}', ['as'=> 'departmentHeads.update', 'uses' => 'Department_Head\DepartmentHeadController@update']);
Route::patch('departmentHeads/{departmentHeads}', ['as'=> 'departmentHeads.update', 'uses' => 'Department_Head\DepartmentHeadController@update']);
Route::get('departmentHeads/{id}/delete', ['as' => 'departmentHeads.delete', 'uses' => 'Department_Head\DepartmentHeadController@getDelete']);
Route::get('departmentHeads/{id}/confirm-delete', ['as' => 'departmentHeads.confirm-delete', 'uses' => 'Department_Head\DepartmentHeadController@getModalDelete']);
Route::get('departmentHeads/{departmentHeads}', ['as'=> 'departmentHeads.show', 'uses' => 'Department_Head\DepartmentHeadController@show']);
Route::get('departmentHeads/{departmentHeads}/edit', ['as'=> 'departmentHeads.edit', 'uses' => 'Department_Head\DepartmentHeadController@edit']);

});


// Route::group(array('prefix' => 'admin/admin/','namespace' => 'admin','middleware' => 'admin','as'=>'admin.employee.'), function () {

// Route::get('employees', ['as'=> 'employees.index', 'uses' => 'Employee\EmployeeController@index']);
// Route::post('employees', ['as'=> 'employees.store', 'uses' => 'Employee\EmployeeController@store']);
// Route::get('employees/create', ['as'=> 'employees.create', 'uses' => 'Employee\EmployeeController@create']);
// Route::put('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::patch('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::get('employees/{id}/delete', ['as' => 'employees.delete', 'uses' => 'Employee\EmployeeController@getDelete']);
// Route::get('employees/{id}/confirm-delete', ['as' => 'employees.confirm-delete', 'uses' => 'Employee\EmployeeController@getModalDelete']);
// Route::get('employees/{employees}', ['as'=> 'employees.show', 'uses' => 'Employee\EmployeeController@show']);
// Route::get('employees/{employees}/edit', ['as'=> 'employees.edit', 'uses' => 'Employee\EmployeeController@edit']);

// });


// Route::group(array('prefix' => 'employee/employee/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.employee.'), function () {

// Route::get('employees', ['as'=> 'employees.index', 'uses' => 'Employee\EmployeeController@index']);
// Route::post('employees', ['as'=> 'employees.store', 'uses' => 'Employee\EmployeeController@store']);
// Route::get('employees/create', ['as'=> 'employees.create', 'uses' => 'Employee\EmployeeController@create']);
// Route::put('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::patch('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::get('employees/{id}/delete', ['as' => 'employees.delete', 'uses' => 'Employee\EmployeeController@getDelete']);
// Route::get('employees/{id}/confirm-delete', ['as' => 'employees.confirm-delete', 'uses' => 'Employee\EmployeeController@getModalDelete']);
// Route::get('employees/{employees}', ['as'=> 'employees.show', 'uses' => 'Employee\EmployeeController@show']);
// Route::get('employees/{employees}/edit', ['as'=> 'employees.edit', 'uses' => 'Employee\EmployeeController@edit']);

// });


// Route::group(array('prefix' => 'employee/employee/','namespace' => 'employee','middleware' => 'employee','as'=>'employee.employee.'), function () {

// Route::get('employees', ['as'=> 'employees.index', 'uses' => 'Employee\EmployeeController@index']);
// Route::post('employees', ['as'=> 'employees.store', 'uses' => 'Employee\EmployeeController@store']);
// Route::get('employees/create', ['as'=> 'employees.create', 'uses' => 'Employee\EmployeeController@create']);
// Route::put('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::patch('employees/{employees}', ['as'=> 'employees.update', 'uses' => 'Employee\EmployeeController@update']);
// Route::get('employees/{id}/delete', ['as' => 'employees.delete', 'uses' => 'Employee\EmployeeController@getDelete']);
// Route::get('employees/{id}/confirm-delete', ['as' => 'employees.confirm-delete', 'uses' => 'Employee\EmployeeController@getModalDelete']);
// Route::get('employees/{employees}', ['as'=> 'employees.show', 'uses' => 'Employee\EmployeeController@show']);
// Route::get('employees/{employees}/edit', ['as'=> 'employees.edit', 'uses' => 'Employee\EmployeeController@edit']);

// });

