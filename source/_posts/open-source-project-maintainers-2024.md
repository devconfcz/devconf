---
extends: _layouts.post
section: content
title: "Open Source Maintainer Meetup at DevConf.CZ 2024: Best Practices for Open Source Project Maintainers"
date: 2024-11-07
author: "Tomas Tomecek, Lenka Bocincova | Photo: Eva Ruzickova"
description: Best Practices for Open Source Project Maintainers
cover_image: /assets/images/blog/osmm-24.png
featured: true
---

During DevConf.CZ 2024 conference in Brno, we hosted [a meetup for upstream maintainers](https://pretalx.com/devconf-cz-2024/talk/PSGCSK/), bringing together roughly 25 project maintainers to share best practices and challenges in nurturing open source communities. It was heartwarming to see so many experienced maintainers from projects like OpenSSL, RPM, polkit, podman, Copr, KubeVirt and many more attend our meetup. We were quite anxious how many people would show up, especially after being the first session after the Day 1 keynote. In the end, we’ve got a great mix of experienced people from various projects. One thing that blew us away was that we didn’t need the slides and questions that we prepared. People were open to share their experience with maintaining their communities and give each other tips very naturally! 

In this blog post we’ll summarize key takeaways and add more resources that can help you address common roadblocks.

## 1. Handling contributions is crucial

**Balancing technical debt and compatibility:** One of the maintainers from RPM highlighted that it’s important to find a balance between accepting contributions and maintaining compatibility with older systems. This might involve accepting smaller fixes while working on larger technical debt solutions in the background. Reviewing some of the contributions can take a lot of time, even trivial changes need to be tested extensively so the maintainers are sure nothing gets broken. In case you are a contributor or want to become one and you are experiencing this, be patient with maintainers, even if you feel like your change is simple and should have been merged weeks ago - the maintainers are responsible for the quality of their project. For a project maintainer it can be hard to accept certain contributions, we suggest you encourage your users to contribute differently, in the way that can help your project, for example by asking for user feedback, as one of the OpenSSL maintainers mentioned.

**Managing large contributions by splitting it to smaller pieces:** We’ve heard another story about migration from Python 2 to Python 3. If you experienced this, you can imagine how big of a task this is. What worked for the maintainer was breaking down contributions into smaller, more manageable pull requests (PRs). It streamlined the review process and made it easier for new contributors to get involved. Reviewing one humongous PR is almost impossible and with so many changes, breakages slip easily. So, having smaller contributions that are properly tested is more safe.

## 2. Being transparent about project plans and blockers

**Share your project plans:** Knowing what the project is planning for the next year and which work won’t fit the team’s capacity can motivate more people to contribute or use the project. Once you share your plans, it’s no surprise to the community which features your team work on while others are postponed. It’s also very transparent to share your accomplishments at the end of the year. Not just to promote your project and the amazing work from your team and contributors, but also to get hard evidence when you feel like not much was being done. As one of the KubeVirt maintainers mentioned, they share annual reports outlining project goals and accomplishments which helps them build trust and fosters user engagement.

**Issue-based prioritization:** Be transparent also about how you prioritize bug fixes and features. One of the maintainers mentioned that they prioritize it based on the number of user-reported issues and it helps them to ensure the project focuses on what matters most to the community. Another maintainer also mentioned that they make this decision publicly during a community call, so the community can engage as well. 

## 3. Effective Code Review

**Maintaining Code Quality:** The importance of thorough code review was emphasized by multiple maintainers, including one of the maintainers from OpenSSL. Two reviews per pull request and attention to security implications are crucial for high-quality and secure code.

**Providing Clear Feedback:** Maintainer of polkit highlighted the importance of clear communication during code review. It can take weeks to review a contribution, expectations should be set straight and with transparent communication no one should be surprised if a review takes longer than usual. We heard a great story from Mirek who mentioned that he gained commit access after a well-done PR. This motivated him to do the same for some of his projects after a contributor submitted high quality PR.

## 4. Engaging your user base

**Your perspective vs users perspective:** You may think you know your project the best because you are the lead developer and maintainer. It’s very likely true. Though the people who use your software daily know it very well as well, from a different perspective, as they use it and they rely on it. Let’s be honest, users can sometimes be very creative and easily use some features differently than was intended. Sometimes it is just “funny” but sometimes it can inspire you to improve the project. 

**Don’t be shy, ask them:** Reaching out to users to understand their use case needs and pain points can provide valuable direction for project development. There is no “best answer” that would fit all the projects how to do this, as it depends on what you need help with and what channels you have in your community, but from the experience of some maintainers on our meetup, scheduling a community call or doing a community survey might be some of the things that you can try to get direct feedback on usability, concrete features, or find out what’s pissing them off. One of the maintainers also mentioned that doing a workshop rather than a talk at conferences like DevConf might be very useful for having productive discussions and soliciting user input.

## 5. Effective communication within your community

Choose the channels that work for your community and regularly remind people the purpose of each of them. 

**Beyond chatrooms:** While chat rooms are popular for discussions, they might not be ideal for bug reporting. Yes, for people it might be easier to write about an issue they are currently struggling with and seek for help in a chat, but for a maintainer, it is difficult to keep a track of it. In Podman, they use dedicated issue trackers to streamline the bug reporting process. If an actual issue is being “submitted” in the chat, maintainers regularly ask people to go ahead and properly report it in the upstream repository instead of just letting it linger in chat. It will also help you build a connection with the user that might be potentially your new contributor. 

**Developers’ struggles with communication:** Some of the maintainers admitted that they might not be natural communicators. And it is understandable, but not something that can’t be improved by trying. Spending some time on writing clear contribution guidelines and linking it in the project README or creating PR/issue templates can make the communication a bit easier  and reduce back-and-forth with contributors. And yes, we know that people usually don’t read instructions, but having them in hand and sharing it as often as needed instead of repeating yourself all the time can help a lot. 

## Thanks for participating!

Thanks to all who joined our meetup and shared their experience with others. Your thoughts help us put this blog post together and share the main takeaways with those that couldn’t join us. If you want to explore other community building talks that was part of DevConf, we recommend checking out the recording of Greg Sutcliffe’s talk: ["Build it and they will come" and other myths](https://www.youtube.com/watch?v=7Vwy9GcSvgQ) where he also talks about how to target the right people with the tasks instead of asking “Who can help with this?” or why setting the deadlines and roadmaps, even unrealistic, can motivate you and your community members.

