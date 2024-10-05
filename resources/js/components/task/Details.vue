<template>
    <div class="modal fade" id="task-details" tabindex="-1" aria-labelledby="taskLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskLabel">Task Details</h1>
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1_818)">
                                <path d="M0 0H24V24H0V0Z" fill="#F4F5F7" />
                                <path
                                    d="M12 10.586L16.95 5.63599L18.364 7.04999L13.414 12L18.364 16.95L16.95 18.364L12 13.414L7.04999 18.364L5.63599 16.95L10.586 12L5.63599 7.04999L7.04999 5.63599L12 10.586Z"
                                    fill="#03053D" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_818">
                                    <rect width="24" height="24" rx="3" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="tas-details">
                        <div class="task-name">
                            <h4>{{task.title}}</h4>
                            <p class="d-flex align-items-center gap-3"><img src="/assets/images/date.png" alt="date">
                                {{moment(task.created_at).format('MMMM D, YYYY, [at] h:mm A')}}
                            </p>
                        </div>
                        <div class="task-discription">
                            <h4>Description</h4>
                            <p> {{task.description}} </p>
                        </div>
                        <div class="task-member">
                            <h4>Member</h4>
                            <ul class="card-member border-0">
                                <li>
                                    <img src="/assets/images/members/member-1.png" alt="member" />
                                </li>
                                <li>
                                    <img src="/assets/images/members/member-1.png" alt="member" />
                                </li>
                                <li>
                                    <img src="/assets/images/members/member-1.png" alt="member" />
                                </li>
                            </ul>
                        </div>
                        <div class="task-assignee">
                            <h4>Task Assignee</h4>
                            <p>Al Mamun (Super Admin)</p>
                        </div>
                        <div class="task-status">
                            <h6>Status</h6>
                            <p> {{task.status}} </p>
                        </div>
                        <div class="task-write">
                            <h4>Write your comment</h4>
                            <textarea name="message" id="message" placeholder="Write your massage..."></textarea>
                        </div>
                        <!-- assign message -->
                        <div class="assign-message">
                            <div class="assign-message-list">
                                <img src="/assets/images/members/member-1.png" alt="">
                                <p>Nur Hasan Nishad</p>
                                <span>Nov 11 at 8:42 AM</span>
                            </div>
                            <div class="message-write">
                                <div class="message-text">
                                    <p>As the meeting transitioned to the core of the agenda, screens were shared, and
                                        the virtual
                                        whiteboard came alive with wireframes and prototypes. Design choices, user
                                        flows, and interactions
                                        were dissected collaboratively. The team engaged in a constructive dialogue,
                                        offering feedback and
                                        suggestions that breathed new life into the designs.</p>
                                </div>
                                <div>
                                    <a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1_862)">
                                                <path
                                                    d="M12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22ZM12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20ZM7 13H9C9 13.7956 9.31607 14.5587 9.87868 15.1213C10.4413 15.6839 11.2044 16 12 16C12.7956 16 13.5587 15.6839 14.1213 15.1213C14.6839 14.5587 15 13.7956 15 13H17C17 14.3261 16.4732 15.5979 15.5355 16.5355C14.5979 17.4732 13.3261 18 12 18C10.6739 18 9.40215 17.4732 8.46447 16.5355C7.52678 15.5979 7 14.3261 7 13ZM8 11C7.60218 11 7.22064 10.842 6.93934 10.5607C6.65804 10.2794 6.5 9.89782 6.5 9.5C6.5 9.10218 6.65804 8.72064 6.93934 8.43934C7.22064 8.15804 7.60218 8 8 8C8.39782 8 8.77936 8.15804 9.06066 8.43934C9.34196 8.72064 9.5 9.10218 9.5 9.5C9.5 9.89782 9.34196 10.2794 9.06066 10.5607C8.77936 10.842 8.39782 11 8 11ZM16 11C15.6022 11 15.2206 10.842 14.9393 10.5607C14.658 10.2794 14.5 9.89782 14.5 9.5C14.5 9.10218 14.658 8.72064 14.9393 8.43934C15.2206 8.15804 15.6022 8 16 8C16.3978 8 16.7794 8.15804 17.0607 8.43934C17.342 8.72064 17.5 9.10218 17.5 9.5C17.5 9.89782 17.342 10.2794 17.0607 10.5607C16.7794 10.842 16.3978 11 16 11Z"
                                                    fill="#6B7280" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_862">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                        <!-- assign message -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import moment from 'moment';

const props = defineProps({
    task: Object
});
</script>