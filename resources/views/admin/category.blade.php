@extends('admin.layouts.app')

@section('title', 'Category')
@section('pagename', 'Category Section')
@section('custom-styles')
    <style>
        .tabulator .tabulator-row .tabulator-cell,
        .tabulator-col-content {
            text-align: center;
        }

        #search {
            width: 27%;
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-span-12">
        <div class="box">
            <div class="box-header">
                <div>
                    <select id="filter-field" class="ti-form-select select-1-filter">
                        <option></option>
                        <option value="category_name">Category Name</option>
                    </select>

                    <select id="filter-type" class="ti-form-select select-2-filter">
                        <option value="like">like</option>
                        <option value="=">=</option>
                        <option value="<">
                            << /option>
                        <option value="<=">
                            <=< /option>
                        <option value=">">></option>
                        <option value=">=">>=</option>
                        <option value="!=">!=</option>
                    </select>

                    <input id="filter-value" class="ti-form-input select-3-filter" type="text"
                        placeholder="value to filter">

                    <button id="filter-clear" class="ti-btn ti-btn-warning">Clear Filter</button>
                    <a href="{{ route('add-category') }}" type="button" class="ti-btn ti-btn-success"
                        style="float:right;">Add
                        New
                        Category</a>
                </div>

            </div>
            <div class="box-body">
                <div class="overflow-auto table-bordered">
                    <div id="category-table" class="ti-custom-table ti-striped-table ti-custom-table-hover tabulator"
                        role="grid" tabulator-layout="fitColumns">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('custom-scripts')
    <script>
        var tabledata = [];

        @foreach ($categories as $category)
            tabledata.push({
                sl_no: {{ $category->id }},
                category_name: '{{ $category->category_name }}',
                status: '{{ $category->status }}',
                orderby: '{{ $category->order }}'
            });
        @endforeach

        jQuery(document).ready(function($) {
            "use strict";
            /* Start::Choices JS */
            document.addEventListener('DOMContentLoaded', function() {
                var genericExamples = document.querySelectorAll('[data-trigger]');
                for (let i = 0; i < genericExamples.length; ++i) {
                    var element = genericExamples[i];
                    new Choices(element, {
                        allowHTML: false,
                    });
                }
            });


            //Basic Tabulator
            var table = new Tabulator("#category-table", {
                width: 150,
                minWidth: 100,
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 10,
                paginationSizeSelector: [5, 10, 15, 20, 25],
                paginationCounter: "rows",
                data: tabledata,
                layout: "fitColumns",
                headerFilterPlaceholder: "Search...",
                columns: [{
                        title: "ID",
                        field: "sl_no",
                        sorter: "string",
                        width: 100,
                    },
                    {
                        title: "Category Name",
                        field: "category_name",
                        sorter: "string",
                        align: "center"
                    },
                    {
                        title: "Status",
                        field: "status",
                        sorter: "string",
                        width: 180,
                        align: "center",
                        formatter: function(cell, formatterParams, onRendered) {
                            var rowData = cell.getRow().getData();
                            let statusIcon = '';
                            if (rowData.status == 'active') {
                                statusIcon =
                                    "<button type=\"button\" class=\"ti-btn ti-btn-soft-warning\" onclick=\"changeStatus(" +
                                    rowData.sl_no + ", '" + rowData.status +
                                    "', this);\"><i class='ti ti-bulb-filled'></i></button>";
                            } else {
                                statusIcon =
                                    "<button type=\"button\" class=\"ti-btn ti-btn-soft-dark\" onclick=\"changeStatus(" +
                                    rowData.sl_no + ", '" + rowData.status +
                                    "', this);\"><i class='ti ti-bulb-off'></i></button>";
                            }
                            return statusIcon;
                        }
                    },
                    {
                        title: "Order",
                        field: "orderby",
                        sorter: "number",
                        width: 180
                    },
                    {
                        title: "Action",
                        field: "action",
                        width: 180,
                        formatter: function(cell, formatterParams, onRendered) {
                            var rowData = cell.getRow().getData();
                            var editButton =
                                '<button class="ti-btn ti-btn-soft-success" onclick="editAction(' +
                                rowData.sl_no + ')">Edit</button>';
                            var deleteButton =
                                '<button class="ti-btn ti-btn-soft-danger" data-id="' + rowData
                                .sl_no +
                                '" onclick="deleteAction(' +
                                rowData.sl_no + ')">Delete</button>';

                            return editButton + deleteButton;
                        }
                    },
                ],
            });



            // ---------------------------- Search Functionality ----------------- //

            //Define variables for input elements
            var fieldEl = document.getElementById("filter-field");
            var typeEl = document.getElementById("filter-type");
            var valueEl = document.getElementById("filter-value");

            //Custom filter example
            function customFilter(data) {
                return data.car && data.rating < 3;
            }

            //Trigger setFilter function with correct parameters
            function updateFilter() {
                var filterVal = fieldEl.options[fieldEl.selectedIndex].value;
                var typeVal = typeEl.options[typeEl.selectedIndex].value;

                var filter = filterVal == "function" ? customFilter : filterVal;

                if (filterVal == "function") {
                    typeEl.disabled = true;
                    valueEl.disabled = true;
                } else {
                    typeEl.disabled = false;
                    valueEl.disabled = false;
                }

                if (filterVal) {
                    table.setFilter(filter, typeVal, valueEl.value);
                }
            }

            //Update filters on value change
            document.getElementById("filter-field").addEventListener("change", updateFilter);
            document.getElementById("filter-type").addEventListener("change", updateFilter);
            document.getElementById("filter-value").addEventListener("keyup", updateFilter);

            //Clear filters on "Clear Filters" button click
            document.getElementById("filter-clear").addEventListener("click", function() {
                fieldEl.value = "";
                typeEl.value = "like";
                valueEl.value = "";

                table.clearFilter();
            });


            // ---------------------------- Search Functionality ----------------- //


        });




        function editAction(id) {
            window.location.href = "{{ route('modify-category', '') }}" + "/" + id;
        }

        function deleteAction(id, buttonElement) {
            let table = document.getElementById('category-table');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'ti-btn bg-secondary text-white hover:bg-secondary focus:ring-secondary dark:focus:ring-offset-secondary',
                    cancelButton: 'ti-btn bg-danger text-white hover:bg-danger focus:ring-danger dark:focus:ring-offset-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    const data = {
                        id: id
                    };

                    fetch("{{ route('delete-category') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify(data),
                        })
                        .then(response => {
                            if (response.ok) {
                                setTimeout(() => {
                                    location.reload();
                                }, 4000);
                                var notifier = new AWN({
                                    position: 'top-right',
                                });
                                notifier.success('Category Deleted Successfully!')
                            } else {
                                var notifier = new AWN({
                                    position: 'top-right',
                                });
                                notifier.alert('Something Went Wrong!')
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            var notifier = new AWN({
                                position: 'top-right',
                            });
                            notifier.alert('Something Went Wrong!')
                        });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            })
        }

        function changeStatus(id, status, element) {
            const url = "{{ route('change-category-status', '') }}";
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const updatedData = {
                id: id,
                status: status
            };
            var notifier = new AWN({
                position: 'top-right',
            });

            Swal.fire({
                title: 'Are you sure you want to change it\'s status?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5e76a6',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: updatedData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            if (response.status == 'true') {
                                if (response.data.status == 'active') {
                                    element.setAttribute('class', 'ti-btn ti-btn-soft-dark');
                                    element.innerHTML = "<i class='ti ti-bulb-off'></i>";
                                    element.setAttribute('onclick', "changeStatus(" + id +
                                        ", 'inactive',this)");
                                } else {
                                    element.setAttribute('class', 'ti-btn ti-btn-soft-warning');
                                    element.innerHTML = "<i class='ti ti-bulb-filled'></i>";
                                    element.setAttribute('onclick', "changeStatus(" + id +
                                        ", 'active', this)");
                                }
                                notifier.success(response.messege);
                            } else {
                                notifier.alert(response.messege);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            notifier.alert(response.messege);
                        }
                    });
                }
            })
        }
    </script>
@endsection
