<html>
<body>
  <div id="chat">
    <textarea v-model="message"></textarea>
    <div>
      <button type="button" @click="send()">送信</button>
    </div>
    <div v-for="m in messages">
      <span v-text="m.created_at"></span>:
      <span v-text="m.body"></span>
    </div>
  </div>
  <script src="/js/app.js"></script>
  <script>

      new Vue({
          el: '#chat',
          data: {
              message: '',
              messages: []
          },
          methods: {
            send() {
              const url = '/ajax/chat';
              const params = { message: this.message };
              axios.post(url, params)
                .then((response) => {

                  // 成功したらメッセージクリア
                  console.log(response);
                  this.message = '';

                });
            },
            getMessages() {
              const url = '/ajax/chat';
              axios.get(url)
                .then((response) => {
                  this.messages = response.data;
                });
            }
          },
          mounted() {
            this.getMessages();

            Echo.channel('chat')
              .listen('MessageCreated', (e) => {
                this.getMessages();
              })
          }
      });

  </script>
</body>
</html>
