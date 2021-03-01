window.Echo.join('larachat_database_chatroom')
.here(users => {
    console.log('Usuários Online:')
    console.log(users)
})
.joining(user => {
    console.log('Entrou:')
    console.log(user)
})
.leaving(user => {
    console.log('Saiu:')
    console.log(user)
})
