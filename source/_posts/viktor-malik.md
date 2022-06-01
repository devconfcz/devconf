---
extends: _layouts.post
section: content
title: "Viktor Malik: Contributing to kernel as a day-to-day job"
date: 2022-05-27
cover_image: /assets/images/blog/interviews-devconf-cz.png
featured: true
categories: [interviews]
---

What is it like being an open source contributor as part of your day-to-day job? Viktor Malik is a software engineer at Red Hat and a contributor to the BPFtrace project along with many others, such as DiffKemp and 2LS. We asked him about his experience.

> ### **About Viktor Malik**
>
> ![Profile Picture](/assets/images/blog/interviews/vmalik.jpg) Viktor Malik is a software engineer at Red Hat, contributing to the [BPFtrace](https://bpftrace.org/) project, and many other projects, including [DiffKemp](https://github.com/viktormalik/diffkemp) and [2LS](https://github.com/diffblue/2ls). Originally from Slovakia, he currently lives in the Czech Republic, pursuing a PhD  at the Brno University of Technology alongside his software engineering projects. When he is not at work, you can find him doing sports, or spending time with his family. He’s an active volleyball player, currently playing in the Brno amateur league. His biggest inspiration is anything and everything - people, news, projects, articles, books. Victor says that his most recent source of inspiration came from the [Changelog podcast](https://changelog.com/podcast). You can find Viktor on  Twitter as [@ViktorMalikSK](https://twitter.com/ViktorMalikSK). 
>
> Watch the recording of Viktor's DevConf.CZ 2022 talk: [Linux tracing made simpler with bpftrace](https://youtu.be/gSxntAO2Iys).

### Q: How did you start contributing to BPFtrace?

My start was pretty simple. It was two years ago when I switched teams within Red Hat and moved into the Linux kernel team where I started working on a tool called BPFtrace. We quickly realised that when we want to improve this tool and the user experience that goes with it, the best way to do so is to contribute to the upstream project. So I started contributing to BPFtrace, started figuring out some simple bug fixes, and then got into more complicated stuff.

Even though my contributions to this project have been purely work-related,  I find it hard to separate my free time from the time I spend at work. It’s because sometimes, when an issue  requires my attention, I have no problem working on it outside of my official working hours. But, of course, I try to not think about work on my days off ;)

### Q: What makes BPFtrace stand out to you?

BPF technology is one of the coolest things about the Linux kernel these days, and that is why I am very excited to work with it. I'm also a PhD student, and in my research I focus on analysing software software, so this is somewhat related to what I'm doing, and I'm interested in this area.

And for those of you who are not familiar with BPFtrace, BPF technology is part of the Linux kernel, which is the core of GNU/Linux operating systems. It is a fairly recent addition to the kernel, having been introduced into the kernel codebase only about eight years ago. This technology allows you to execute user code inside a running Linux kernel, which is something that wasn't possible before. Previously, if you wanted to execute your code, the simplest way you could do so was by compiling it as a kernel module and then loading the module into the kernel. Now, you can execute your own code without having to modify the kernel, load additional kernel modules, or, basically, do anything extra.

One of the two biggest use cases for this is tracing the processes inside a running system (the other use-case is networking). Sometimes you want to know what's going on with your system while it’s running, for example, because your system is slow, or you are experiencing some network problems, etc. Tracing allows you to identify the source of these problems and  gather potentially useful information about your system (Such as, what processes are running, what files they're opening, what functions they are calling, and so on).

BPFtrace is a tool that allows you to do this using the BPF technology in the Linux kernel in a very quick way. It provides its own high-level programming language, which allows you to write so-called probes. Basically, you write a short simple program in which you specify what you want to trace in the system. BPFtrace then compiles this code for you into the BPF subsystem of the kernel, executes it, and gives you the result.

BPFtrace is a very convenient way of live-tracing a running kernel without the need to modify it. You can do it on your customer’s machine or on your production machines. And you can do this using a very simple syntax that is quite easy to learn. In addition, BPFtrace is very efficient, meaning that using it does not slow down your system and you can trace literally anything that's going on in it, which is very useful for system administrators and many other people around.

### Q: What is the hardest and the easiest part of being an open-source project contributor?

The greatest thing about being a BPFtrace contributor, or an open-source projects contributor in general, is the community. We currently have 140 contributors on GitHub since the beginning of the project, and from those contributors, 10-20 are developers who actively participate in developing this technology. We also have probably thousands of users, some of whom are really active  and sometimes even open issues and contribute bug fixes.

The community makes your life easier. I’m not saying that it’s easy, but it's easier than it would be without the community because it just simplifies many things. People find bugs in your software, so you don't need  a large QA team to discover them. People even fix these problems for you. If you don't know how to do something, you can ask. And someone will definitely be able to help you. If you need a feature that is specific to your needs, you just open an issue on GitHub. And someone will almost certainly  implement it in a matter of weeks, which is great.

On the other hand, the difficult part of contributing to an open-source project is implementing new stuff within a large project. Some people don't enjoy that you have to comply with the practices that have been established within the project that you're contributing to. And if someone wants you to do something differently than the way you’d like to, that may be difficult for you to deal with. This can get frustrating especially when you open a pull request with some great cool changes and then some maintainers (such as me) will start bothering you with code formatting issues, ask you to  re-implement your contribution because they typically  do things differently, refuse to merge your PR because you are missing tests, and so on. I understand that this is something that some people may find frustrating, but consistency is one of the most important parts, and contributors just need to comply with the rules of the project that they are working on.

### Q: What is the best way to reward open source contributions?

It's hard to say because I'm working on this as a part of my day-to-day job, which I'm being paid for by Red Hat. So it's easy for me to say that it's enough that my name is written somewhere, and that's it. But I think that for open source contributions in general the most appreciated thing is being publicly recognized for my work and having my name connected to the project. 

And if you ask me whether open-source project maintainers should be paid, I would say “yes”. But not in the sense that a project should pay each and every one of its contributors, because no one has the money for that, obviously. What I mean to say is that more companies should get involved in contributing to open-source projects, as part of their day-to-day development workflow. Also, more companies should make their code open, and let their developers dwork upstream, in the open-source world.

And the developers should be paid for their work. Because it not only contributes to the overall community, but at the end of the day, it is also a great benefit for the company. I know that because I work for Red Hat, but more companies out there should start doing what we do.

Luckily, companies are starting to embrace open source. I can give a nice example with BPF. The BPF technology in the kernel is intensively developed by guys from Facebook, whose large part of the business is commercial closed source. But they are really doing a lot of good open source stuff, too.

When I look at the ratio of paid to non-paid project contributors on BPFtrace, the majority of people I know among those contributors work for  companies that have an interest in pushing BPFtrace forward. I already mentioned Facebook, and I know Netflix, too, has a lot of interest in working on these tools. So at least from these two companies, there’s a number of people contributing to BPFtrace. But, for example, as far as I know, the original founder of BPFtrace wasn’t part of any company when he started this project.

### Q: How did the pandemic affect the project and your contribution?

I joined this team and project when the pandemic started, so I’ve never met anyone working on it in person. So  it's difficult for me to compare my experience with the pre-pandemic life. I usually work from home and communicate with people over email or issues on GitHub. I think that this isn’t much different from the way things were before because most of the people who work on BPFtrace are from other countries,anyway. We're even in different time zones, which makes it even more difficult because you sometimes have to wait for people to review your pull requests and answer your questions.

In general, I can't complain, I think that I got along with the situation pretty nicely. Working from home and doing everything virtually is basically fine for me. Of course, I miss the office, but as far as  the actual work is concerned, I wouldn't say that the pandemic impacted me a lot.

### Q: How did DevConf.cz impact your open source contribution?

What I enjoy the most about DevConf are the random conversations with people you meet in the hallways while having a coffee, or people who approach you after you give a talk and want to speak about it. Over the years that I attended DevConf, I’ve had some nice conversations that gave me ideas about my project, which I can follow.

It is not connected with BPFtrace, but my best experience was actually when I presented my first talk in 2019 about [Analysing differences in kernel parameters](https://www.youtube.com/watch?v=PUZSaLf9exg), during my second time attending DevConf. The nice part about it was that I didn't expect to have a room full of people, but it was really packed to the last place. And people seemed to enjoy the talk, and showed real interest in my work because the feedback that I received was very positive. I’ve had some long discussions afterwards, especially with the kernel people, and I would say that this experience prompted my eventual move to the kernel team at Red Hat, where I am right now, working on BPFtrace.

I was also a speaker at this year's virtual DevConf.It was different, but I enjoyed the overall experience, even though I missed the in-person interactions after my talk. I am very much looking forward to the next on-site DevConf where we’ll all have the chance to meet in Brno again.
