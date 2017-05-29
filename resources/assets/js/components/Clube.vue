<template>
    <div>
        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Cadastro de Clube
        </h4>

        <message body="Registro inserido com sucesso"></message>

        <form method="post" action="/clubes" @submit.prevent="onSave" @keydown="errors.clear($event.target.name)">
            <input type="text" class="form-control" id="nome" name="nome" v-model="nome">
            <span class="help is-danger" v-if="errors.has('nome')" v-text="errors.get('nome')"></span>

            <button type="submit" class="btn btn-primary" :disabled="errors.any()">Salvar</button>
        </form>

        <h4>
            <span class="glyphicon glyphicon-sort-by-alphabet"></span> Clubes
        </h4>

        <div class="well">
            <input type="text" class="form-control" placholder="Filtrar a lista abaixo" v-model="search" @keyup="onSearch()">
        </div>

        <hr>

        <table class="table table table-striped table-hover">
            <thead>
                <th>ID:</th>
                <th>Nome</th>
                <th>Ações:</th>
                <th colspan="2"></th>
            </thead>

            <tbody>
                <tr v-for="clube in clubes">
                    <td v-text="clube.id"></td>
                    <td v-text="clube.nome"></td>
                    <td>
                        <button type="submit" class="btn btn-danger" @click.prevent="onDelete(clube)">
                            Excluir
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'

    class Errors {
        constructor() {
            this.errors = {}
        }

        has(field) {
            return this.errors.hasOwnProperty(field)
        }

        get(field) {
            if (this.errors[field]) {
                return  this.errors[field][0]
            }
        }

        any() {
            return Object.keys(this.errors).length > 0

        }


        record(errors) {
            this.errors = errors
        }

        clear(field) {
            delete this.errors
        }
    }

    export default {
        data() {
          return {
              clubes:[],
              nome: '',
              search: '',
              model: {},
              errors: new Errors()
          }
        },
        props: ['clubesProp'],

        methods: {
            onSearch() {
              axios.get('/clubes/' + this.search)
                   .then(response => this.clubes = response.data.model.data)
                   .catch((respose) => this.clubes = JSON.parse(this.clubesProp))
            },
            onSave() {
              axios.post('/clubes', this.$data)
                   .then(response => this.onSucess(response))
                   .catch(error => this.errors.record(error.response.data))
            },
            onDelete(clube) {
              axios.delete('/clubes/' + clube.id, clube)
                   .then(response => this.clubes.splice(clube, 1))
                   .catch(respose => alert('Nenhuma registro encontrado'))
            },
            onSucess(response) {
                alert(response.data.message)

                this.nome = ''
            }
        },
        mounted () {
            axios.get('/clubes')
                 .then(response => this.clubes = JSON.parse(this.clubesProp))
        },
   }
</script>

<style scoped>
    help {
        display: block;
        font-size: 11px;
        margin-top: 5px;
    }

    is-danger {
        color: #ff3860;
    }
</style>