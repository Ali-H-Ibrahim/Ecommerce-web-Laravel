class InteractiveChatbox {
    constructor(a, b, c) {
        this.args = {
            button: a,
            chatbox: b
        }
        this.icons = c;
        this.state = false;
    }

    display() {
        const {button, chatbox} = this.args;

        button.addEventListener('click', () => this.toggleState(chatbox))
        chatbox.classList.add('hide_as')
    }

    toggleState(chatbox) {
        this.state = !this.state;
        this.showOrHideChatBox(chatbox, this.args.button);
    }

    showOrHideChatBox(chatbox, button) {
        if(this.state) {
            chatbox.classList.add('chatbox--active')
            chatbox.classList.remove('hide_as')
            this.toggleIcon(true, button);
        } else if (!this.state) {
            chatbox.classList.remove('chatbox--active')
            chatbox.classList.add('hide_as')
            this.toggleIcon(false, button);
        }
    }

    toggleIcon(state, button) {
        const { isClicked, isNotClicked } = this.icons;
        let b = button.children[0].innerHTML;

        if(state) {
            button.children[0].innerHTML = isClicked;
        } else if(!state) {
            button.children[0].innerHTML = isNotClicked;
        }
    }
}
