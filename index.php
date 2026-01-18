<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnWithAmine</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background: #f4f4f4; }
        h1 { color: #333; text-align: center; }
        .youtube { display: block; margin: 20px auto; text-align: center; font-size: 24px; }
        footer { text-align: center; margin-top: 40px; color: #666; }
    </style>
</head>
<body>
    <h1 style="
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
<<<<<<< HEAD
        padding: 20px 40px;
        margin: 20px auto;
        border-radius: 15px;
        display: inline-block;
        font-size: 2.5em;
        text-align: center;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        width: calc(100% + 40px);
        max-width: 800px;
=======
        padding: 30px 20px;
        margin: -20px -20px 40px -20px;  /* Full viewport width */
        border-radius: 0 0 20px 20px;    /* Bottom corners only */
        font-size: 2.5em;
        text-align: center;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% + 40px);        /* Edge-to-edge */
>>>>>>> 115c4b8096f28ac9241631e5f361ee2fe63c5204
    ">🚀 Welcome to LearnWithAmine</h1>
    <p style="text-align: center; font-size: 20px; line-height: 1.6;">
        Immigration guidance for US/Canada<br>
        Visa applications (F1, OPT, Express Entry, PNP)<br>
        Form tutorials (imm5669e, DS-11, SINP)<br>
        Passport/OCI processes, and personal experiences (US F1 visa, CPT)
    </p>
    <a href="https://www.youtube.com/@LearnwithAmine" class="youtube" target="_blank">
        📺 Watch on YouTube
    </a>

    <footer style="text-align: center; margin-top: 40px; color: #666; font-size: 14px;">
        &copy; <?php echo date('Y'); ?> All Rights Reserved | LearnWithAmine.com
    </footer>

    <div id="chatbot" style="position:fixed;bottom:20px;right:20px;width:350px;height:500px;background:white;border-radius:15px;box-shadow:0 10px 40px rgba(0,0,0,0.3);display:none;z-index:1000;">
        <div style="background:#667eea;color:white;padding:15px;border-radius:15px 15px 0 0;">
            How can I help 🚀
            <button onclick="toggleChat()" style="float:right;background:none;border:none;color:white;font-size:20px;">×</button>
        </div>
        <div id="chat-messages" style="height:380px;overflow-y:auto;padding:15px;"></div>
        <input id="chat-input" placeholder="Ask about visas..." style="width:calc(100%-30px);padding:12px;border:none;border-top:1px solid #eee;outline:none;" onkeypress="sendMessage(event)">
    </div>
    <button onclick="toggleChat()" style="position:fixed;bottom:20px;right:20px;background:#667eea;color:white;border:none;border-radius:50%;width:60px;height:60px;font-size:18px;box-shadow:0 6px 20px rgba(102,126,234,0.4);">💬</button>

    <script>
    let chatOpen = false;
    function toggleChat() {
        document.getElementById('chatbot').style.display = chatOpen ? 'none' : 'block';
        chatOpen = !chatOpen;
    }

    async function sendMessage(e) {
        if (e.key === 'Enter') {
            const input = document.getElementById('chat-input');
            const msg = input.value.trim();
            if (!msg) return;

            addMessage('You', msg);
            input.value = '';

            try {
                const response = await fetch('/api/chat.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: msg })
                });

                const text = await response.text();
                console.log('Raw API response:', text);  // Check browser F12>Console

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${text}`);
                }

                const data = JSON.parse(text);
                addMessage('Bot', data.reply);
            } catch (error) {
                console.error('Chat error:', error);
                addMessage('Bot', 'Sorry, bot error. Try "F1 visa" or "Express Entry".');
            }
        }
    }

    function addMessage(sender, text) {
        const div = document.createElement('div');
        div.innerHTML = `<strong>${sender}:</strong> ${text.replace(/\n/g,'<br>')}`;
        document.getElementById('chat-messages').appendChild(div);
        div.scrollIntoView();
    }
    </script>

</body>
</html>
