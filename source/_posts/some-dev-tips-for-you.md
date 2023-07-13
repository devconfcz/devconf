---
extends: _layouts.post
section: content
title: "Some dev tips for you"
date: 2023-07-13
author: Tomas Tomecek
cover_image: /assets/images/blog/interviews-devconf-cz.png
featured: true
---

Session: [Inception: dev tips marketplace](https://devconfcz2023.sched.com/event/1MYeN/inception-dev-tips-marketplace)

This session was a lot of fun! Instead of creating slides before and presenting them at the conference, the usual, together with the attendees, we created content during this talk. I promised I’d share the results with you. Let’s get into it!

The site that made all of this possible is [menti.com](http://menti.com). It's an interactive tool that helps you interact with the audience. I’d pop a question on the screen and people would answer from their phones or laptops. We would then engage in a discussion afterwards about the answers.

We had five generic questions.

![Question 1](/assets/images/blog/ttomecek/q1.jpg)

We started with an intro question about programming languages. Interesting to see that it corresponds with 2022 StackOverflow’s developer survey: [https://survey.stackoverflow.co/2022#section-most-loved-dreaded-and-wanted-programming-scripting-and-markup-languages](https://survey.stackoverflow.co/2022#section-most-loved-dreaded-and-wanted-programming-scripting-and-markup-languages). I never heard of [svelte](https://svelte.dev/), so I had to find it out. Frontend technologies are moving so fast.

![Question 2](/assets/images/blog/ttomecek/q2.jpg)

Since I co-teach git together with my colleague Irina, my first big question had to be about git. Blame command being the biggest surprise for me. It’s a very useful tool to understand how some code grown over time and why. But I’m so happy to see that rebase -i (aka interactive rebase) being so big, that is my favorite git command that I think every engineer should know. Bisect process is also helpful when you are working in a bigger codebase with other developers and try to identify a commit that changed some behavior. The mention of worktree made me qustion the audience. The person who submitted it explained that he uses worktree when working on kernel and needs physical access to files from multiple branches at the same time.

![Question 3](/assets/images/blog/ttomecek/q3.jpg)

Being up to date with information is crucial. Reddit, youtube, mastodon and twitter seem to dominate the information space among devconf participants. I need to ask about concrete channels next time :)

![Question 4](/assets/images/blog/ttomecek/q4.jpg)

We, as developers, need tools to do our work. I am so pleased seeing many of them in this slide, some I use myself but many I don’t even know. 

During the presentation I asked about [fzf](https://github.com/junegunn/fzf), a command-line fuzzy finder. As the readme states “It's an interactive Unix filter for command-line that can be used with any list; files, command history, processes, hostnames, bookmarks, git commits, etc.”. Neat! 

Other tools from the center of the word cloud are [blesh](https://github.com/akinomyoga/ble.sh) (line editor for bash), [bat](https://github.com/sharkdp/bat) (cat on whale steroids), pycharm (popular python IDE), … 

What are your favorites?

![Question 5](/assets/images/blog/ttomecek/q5.jpg)

![Question 6](/assets/images/blog/ttomecek/q6.jpg)

As we spend a lot of time in the command-line, using efficient aliases (shortcuts for commands) is essential. The wip alias was the MVP: print git branches that I worked on recently. Just amazing!

### What's next?

Since this was the first time I ran this session, I wanna do it more! There weren't enough questions as we finished earlier. I expected we would spend more time discussing and exchanging ideas. One of the attendees (thank you and sorry I didn’t catch your name) recommended more focused questions - how to solve concrete problems that people tend to have. That would totally spark more interest.

Thank you to everyone who attended and contributed and kudos to menti.com for being the platform where we could do this.
