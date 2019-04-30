<template>
    <div>
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Пользователи:</h4>
                        </div>
                        <div class="card-body">
                            <div class="users">
                                <selection-group-users
                                        :users="users.teachers"
                                        title-group="Преподаватели"
                                        @change="setSelected($event)"
                                        :selected-users="selected"
                                        group="teachers"
                                />
                                <br>

                                <selection-group-users
                                        :users="users.applicants"
                                        title-group="Абитуриенты"
                                        @change="setSelected($event)"
                                        :selected-users="selected"
                                        group="applicants"
                                />
                                <br>

                                <div><strong>Студенты</strong></div>
                                <br>
                                <div v-for="group in users.groups">
                                    <selection-group-users
                                            :users="group.students"
                                            :title-group="group.name"
                                            @change="setSelected($event)"
                                            :selected-users="selected"
                                            :group="group.id"
                                    />
                                    <br>
                                </div>

                                <selection-group-users
                                        :users="users.others"
                                        title-group="Прочее"
                                        @change="setSelected($event)"
                                        :selected-users="selected"
                                        group="others"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Сообщение:</h4>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" cols="30" rows="10"
                                      placeholder="Сообщение для рассылки" v-model="message"></textarea>
                            <br>
                            <button class="form-control btn btn-primary" @click="send()">
                                Отправить (получателей: {{ countRecipients }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectionGroupUsers from './SelectionGroupUsers';
    import Swal from 'sweetalert2'

    export default {
        data: () => ({
            selected: [],
            checkAllTeachers: false,
            countRecipients: 0,
            users: [],
            message: null,
        }),
        components: {SelectionGroupUsers},
        methods: {
            setSelected(telegramId) {
                let index = this.selected.indexOf(telegramId);

                if (index !== -1) Vue.delete(this.selected, index);
                else this.selected.push(telegramId);

                this.countRecipients = this.selected.length;
            },
            send() {
                if(this.selected.length && this.message) {
                    axios.post('/send-telegram-message', {
                        users: this.selected,
                        message: this.message
                    }).then(response => {
                        this.message = null;
                        Swal.fire(
                            'Отправленно',
                            'Ваше сообщение успешно отправленно',
                            'success'
                        )
                    }).catch(error => {
                        Swal.fire(
                            'Ошибка',
                            'Упс.. Произошла ошибка',
                            'error'
                        )
                    });
                }else {
                    Swal.fire(
                        'Ошибка',
                        'Выберете получателей и введите сообщение',
                        'error'
                    )
                }
            }
        },
        created() {
            axios.get('/get-all-cathedra-users').then(response => {
                this.users = response.data;
            });
        }
    }
</script>

<style>
    .users {
        max-height: 400px;
        overflow-y: scroll;
    }
</style>