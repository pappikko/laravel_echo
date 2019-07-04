<html>
<body>
  <div id="chat">
    <textarea v-model="message"></textarea>
    <div>
      <button type="button" @click="send()">送信</button>
    </div>
    <div v-for="m in messages">
      <!-- 登録された日時 -->
      <span v-text="m.created_at"></span>:
      <span v-text="m.body"></span>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
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
                  console.log(response);
                  this.messages = response.data;
                });
            }
          },
          mounted() {
            this.getMessages();
          }
      });

  </script>
</body>
</html>