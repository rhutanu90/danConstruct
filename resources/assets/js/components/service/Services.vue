<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        API Current Services
                    </span>

                    <a class="action-link" @click="showCreateServiceForm">
                        Create New Service
                    </a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Current Services -->
                <p class="m-b-none" v-if="services.length === 0">
                    You have not created any Services.
                </p>

                <table class="table table-borderless m-b-none" v-if="services.length > 0">
                    <thead>
                    <tr>
                        <th>Service ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Description</th>
                        <th>Color</th>
                        <th>Created By</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="service in services">
                        <!-- ID -->
                        <td style="vertical-align: middle;">
                            {{ service.ID_SERVICE }}
                        </td>

                        <!-- Name -->
                        <td style="vertical-align: middle;">{{ service.SERVICE_NAME }}</td>
                        <td style="vertical-align: middle;">{{ service.ESTIMATED_PRICE }}</td>
                        <td style="vertical-align: middle;">{{ service.ESTIMATED_DURATION }}</td>
                        <td style="vertical-align: middle;">{{ service.SERVICE_DESCRIPTION }}</td>
                        <td style="vertical-align: middle;">{{ service.SERVICE_COLOR }}</td>

                        <!-- Edit Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link" @click="edit(service)">
                                Edit
                            </a>
                        </td>

                        <!-- Delete Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link text-danger" @click="destroy(service)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Service Modal -->
        <div class="modal fade" id="modal-create-service" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Create Service
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in createForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Create Client Form -->
                        <form class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-7">
                                    <input id="create-service-name" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.SERVICE_NAME">
                                    <span class="help-block">Service will be used based on its name and color</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Estimated Price</label>
                                <div class="col-md-7">
                                    <input id="create-service-price" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.ESTIMATED_PRICE">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Estimated Duration</label>
                                <div class="col-md-7">
                                    <input id="create-service-duration" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.ESTIMATED_DURATION">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Color</label>
                                <div class="col-md-7">
                                    <input id="create-service-color" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.SERVICE_COLOR">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="create-service-description"
                                           @keyup.enter="store" v-model="createForm.SERVICE_DESCRIPTION">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="store">Create</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Client Modal -->
        <div class="modal fade" id="modal-edit-service" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Edit Service
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Edit Client Form -->
                        <form class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-7">
                                    <input id="edit-service-name" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.SERVICE_NAME">
                                    <span class="help-block">Service will be used based on its name and color</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Estimated Price</label>
                                <div class="col-md-7">
                                    <input id="edit-service-price" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.ESTIMATED_PRICE">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Estimated Duration</label>
                                <div class="col-md-7">
                                    <input id="edit-service-duration" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.ESTIMATED_DURATION">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Color</label>
                                <div class="col-md-7">
                                    <input id="edit-service-color" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.SERVICE_COLOR">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="edit-service-description"
                                           @keyup.enter="update" v-model="editForm.SERVICE_DESCRIPTION">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="update">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                services: [],

                createForm: {
                    errors: [],
                    SERVICE_NAME: '',
                    ESTIMATED_PRICE: '',
                    ESTIMATED_DURATION: '',
                    SERVICE_COLOR: '',
                    SERVICE_DESCRIPTION: ''
                },

                editForm: {
                    errors: [],
                    ID_SERVICE: '',
                    SERVICE_NAME: '',
                    ESTIMATED_PRICE: '',
                    ESTIMATED_DURATION: '',
                    SERVICE_COLOR: '',
                    SERVICE_DESCRIPTION: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getCurrentServices();

                $('#modal-create-service').on('shown.bs.modal', () => {
                    $('#create-service-name').focus();
                });

                $('#modal-edit-service').on('shown.bs.modal', () => {
                    $('#edit-service-name').focus();
                });
            },

            /**
             * Get all of the OAuth services for the user.
             */
            getCurrentServices() {
                axios.get('/api/services')
                    .then(response => {
                        this.services = response.data;
                    });
            },

            /**
             * Show the form for creating new services.
             */
            showCreateServiceForm() {
                $('#modal-create-service').modal('show');
            },

            /**
             * Create a new OAuth service for the user.
             */
            store() {
                this.persistService(
                    'post', '/api/services',
                    this.createForm, '#modal-create-service'
                );
            },

            /**
             * Edit the given service.
             */
            edit(service) {
                this.editForm.ID_SERVICE = service.ID_SERVICE;
                this.editForm.SERVICE_NAME = service.SERVICE_NAME;
                this.editForm.ESTIMATED_PRICE = service.ESTIMATED_PRICE;
                this.editForm.ESTIMATED_DURATION = service.ESTIMATED_DURATION;
                this.editForm.SERVICE_COLOR = service.SERVICE_COLOR;
                this.editForm.SERVICE_DESCRIPTION = service.SERVICE_DESCRIPTION;

                $('#modal-edit-service').modal('show');
            },

            /**
             * Update the service being edited.
             */
            update() {
                this.persistService(
                    'put', '/api/services/' + this.editForm.ID_SERVICE,
                    this.editForm, '#modal-edit-service'
                );
            },

            /**
             * Persist the client to storage using the given form.
             */
            persistService(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getCurrentServices();

                        form.SERVICE_NAME = '';
                        form.ESTIMATED_PRICE = '';
                        form.ESTIMATED_DURATION = '';
                        form.SERVICE_COLOR = '';
                        form.SERVICE_DESCRIPTION = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given client.
             */
            destroy(service) {
                axios.delete('/api/services/' + service.ID_SERVICE)
                    .then(response => {
                        this.getCurrentServices();
                    });
            }
        }
    }
</script>