---
extends: _layouts.post
section: content
title: "Viktor Malik: Contributing to the kernel as a day job"
date: 2022-06-23
cover_image: /assets/images/blog/interviews-devconf-cz.png
featured: true
categories: [interviews]
---

What is it like being an open source contributor as part of your day job? Viktor Malik is a&nbsp;Software Engineer at Red Hat and a&nbsp;contributor to the BPFtrace project along with many others, such as DiffKemp and 2LS. We asked him about his experience.

> ### **About Viktor Malik**
>
> ![Profile Picture](/assets/images/blog/interviews/vmalik.jpg) Viktor Malik is a&nbsp;Software Engineer at Red Hat, contributing to the [BPFtrace](https://bpftrace.org/) project among many other, including [DiffKemp](https://github.com/viktormalik/diffkemp) and [2LS](https://github.com/diffblue/2ls). Originally from Slovakia, he currently lives in the Czech Republic, pursuing a&nbsp;PhD at the Brno University of Technology alongside his software engineering projects. When he is not at work, you can find him doing sports or spending time with his family. He’s an active volleyball player, currently playing in the Brno amateur league. His biggest inspiration is anything and everything - people, news, projects, articles, books. Victor says that his most recent source of inspiration came from the [Changelog podcast](https://changelog.com/podcast). You can find Viktor on  Twitter as [@ViktorMalikSK](https://twitter.com/ViktorMalikSK). 
>
> Watch the recording of Viktor's DevConf.CZ 2022 talk: [Linux tracing made simpler with bpftrace](https://youtu.be/gSxntAO2Iys).

### Q: How did you start contributing to BPFtrace?

My start was pretty simple. It was two years ago when I&nbsp;switched teams within Red Hat and moved into the Linux kernel team, where I&nbsp;started working on a&nbsp;tool called BPFtrace. We quickly realised that when we want to improve this tool and the user experience that goes with it, the best way to do so is to contribute to the upstream project. So I&nbsp;started contributing to BPFtrace, started figuring out some simple bug fixes, and then got into more complicated stuff.

Even though my contributions to this project have been purely work-related,  I&nbsp;find it hard to separate my free time from the time I&nbsp;spend at work. It’s because sometimes, when an issue  requires my attention, I&nbsp;have no problem working on it outside of my official working hours. But, of course, I&nbsp;try to not think about work on my days off!

### Q: What makes BPFtrace stand out to you?

BPF technology is one of the coolest things about the Linux kernel these days, and that is why I&nbsp;am very excited to work with it. I'm also a&nbsp;PhD student, and in my research I&nbsp;focus on analysing software software, so this is somewhat related to what I'm doing, and I'm interested in this area.

And for those of you who are not familiar with BPFtrace, BPF technology is part of the Linux kernel, which is the core of GNU/Linux operating systems. It is a&nbsp;fairly recent addition to the kernel, having been introduced into the kernel codebase only about eight years ago. This technology allows you to execute user code inside a&nbsp;running Linux kernel, which is something that wasn't possible before. Previously, if you wanted to execute your code, the simplest way you could do so was by compiling it as a&nbsp;kernel module and then loading the module into the kernel. Now, you can execute your own code without having to modify the kernel, load additional kernel modules, or, basically, do anything extra.

One of the two biggest use cases for this is tracing the processes inside a&nbsp;running system (the other use-case is networking). Sometimes you want to know what's going on with your system while it’s running, for example, because your system is slow, or you are experiencing some network problems. Tracing allows you to identify the source of these problems and  gather potentially useful information about your system (e.g., what processes are running, what files they're opening, what functions they are calling).

BPFtrace is a&nbsp;tool that allows you to do this using the BPF technology in the Linux kernel in a&nbsp;very quick way. It provides its own high-level programming language, which allows you to write so-called probes. Basically, you write a&nbsp;short, simple program in which you specify what you want to trace in the system. BPFtrace then compiles this code for you into the BPF subsystem of the kernel, executes it, and gives you the result.

BPFtrace is a&nbsp;very convenient way of live-tracing a&nbsp;running kernel without the need to modify it. You can do it on your customer’s machine or on your production machines. And you can do this using a&nbsp;very simple syntax that is quite easy to learn. In addition, BPFtrace is very efficient, meaning that using it does not slow down your system and you can trace literally anything that's going on in it, which is very useful for system administrators and many other people.

### Q: What is the hardest and the easiest part of being an open source project contributor?

The greatest thing about being a&nbsp;BPFtrace contributor, or an open source project contributor in general, is the community. We currently have 140 contributors on GitHub and from those contributors, 10-20 are developers who actively participate in developing this technology. We also have probably thousands of users, some of whom are really active  and sometimes even open issues and contribute bug fixes.

The community makes your life easier. I’m not saying that it’s easy, but it's easier than it would be without the community because it just simplifies many things. People find bugs in your software, so you don't need  a&nbsp;large QA team to discover them. People even fix these problems for you. If you don't know how to do something, you can ask and someone will definitely be able to help you. If you need a&nbsp;feature that is specific to your needs, you just open an issue on GitHub and someone will almost certainly  implement it in a&nbsp;matter of weeks, which is great.

On the other hand, the difficult part of contributing to an open source project is implementing new stuff within a&nbsp;large project. Some people don't enjoy that you have to comply with the practices that have been established within the project that you're contributing to. And if someone wants you to do something differently than the way you’d like to, that may be difficult for you to deal with. This can get frustrating especially when you open a&nbsp;pull request with some great cool changes and then some maintainers (such as me) will start bothering you with code formatting issues, ask you to re-implement your contribution because they typically do things differently, refuse to merge your PR because you are missing tests, and so on. I&nbsp;understand that this is something that some people may find frustrating, but consistency is one of the most important parts of a project, and contributors just need to comply with the rules of the project that they are working on.

### Q: What is the best way to reward open source contributions?

It's hard to say because I'm working on this as a&nbsp;part of my day job, which means I'm being paid by Red Hat. So it's easy for me to say that it's enough that my name is written somewhere, and that's it. But I&nbsp;think that for open source contributions in general, the most appreciated thing is being publicly recognized for my work and having my name connected to the project. 

And if you ask me whether open source project maintainers should be paid, I&nbsp;would say “yes”. But not in the sense that a&nbsp;project should pay each and every one of its contributors, because no one has the money for that, obviously. What I&nbsp;mean to say is that more companies should get involved in contributing to open source projects, as part of their day-to-day development workflow. Also, more companies should make their code open and let their developers work upstream, in the open source world.

And the developers should be paid for their work. Because it not only contributes to the overall community, but at the end of the day, it is also a&nbsp;great benefit for the company. I&nbsp;know that because I&nbsp;work for Red Hat, but more companies out there should start doing what we do.

Luckily, companies are starting to embrace open source. I&nbsp;can give a&nbsp;nice example with BPF. The BPF technology in the kernel is intensively developed by people from Facebook, where a large part of the business is commercial closed source. But they are really doing a&nbsp;lot of good open source stuff, too.

When I&nbsp;look at the ratio of paid to non-paid project contributors on BPFtrace, the majority of people I&nbsp;know among those contributors work for companies that have an interest in pushing BPFtrace forward. I&nbsp;already mentioned Facebook, and I&nbsp;know Netflix, too, has a&nbsp;lot of interest in working on these tools. So at least from these two companies, there’s a&nbsp;number of people contributing to BPFtrace. But, for example, as far as I&nbsp;know, the original founder of BPFtrace wasn’t part of any company when he started this project.

### Q: How did the pandemic affect the project and your contribution?

I&nbsp;joined this team and project when the pandemic started, so I’ve never met anyone working on it in person. So  it's difficult for me to compare my experience with the pre-pandemic life. I&nbsp;usually work from home and communicate with people over email or issues on GitHub. I&nbsp;think that this isn’t much different from the way things were before because most of the people who work on BPFtrace are from other countries,anyway. We're even in different time zones, which makes it even more difficult because you sometimes have to wait for people to review your pull requests and answer your questions.

In general, I&nbsp;can't complain; I&nbsp;think that I&nbsp;got along with the situation pretty nicely. Working from home and doing everything virtually is basically fine for me. Of course, I&nbsp;miss the office, but as far as the actual work is concerned, I&nbsp;wouldn't say that the pandemic impacted me a&nbsp;lot.

### Q: How did DevConf.cz impact your open source contribution?

What I&nbsp;enjoy the most about DevConf.cz are the random conversations with people you meet in the hallways while having a&nbsp;coffee, or people who approach you after you give a&nbsp;talk and want to speak about it. Over the years that I&nbsp;attended DevConf.cz, I’ve had some nice conversations that gave me ideas about my project, which I&nbsp;can implement.

It is not connected with BPFtrace, but my best experience was actually when I&nbsp;presented my first talk in 2019 about [Analysing differences in kernel parameters](https://www.youtube.com/watch?v=PUZSaLf9exg), during my second time attending DevConf.cz. The nice part about it was that I&nbsp;didn't expect to have a&nbsp;room full of people, but it was really packed. And I&nbsp;knoe people enjoyed the talk and showed real interest in my work because the feedback that I&nbsp;received was very positive. I’ve had some long discussions afterwards, especially with the kernel people, and I&nbsp;would say that this experience prompted my eventual move to the kernel team at Red Hat, where I&nbsp;am right now, working on BPFtrace.

I&nbsp;was also a&nbsp;speaker at this year's virtual DevConf.cz. It was different, but I&nbsp;enjoyed the overall experience, even though I&nbsp;missed the in-person interactions after my talk. I&nbsp;am very much looking forward to the next on-site DevConf.cz where we’ll all have the chance to meet in Brno again.
