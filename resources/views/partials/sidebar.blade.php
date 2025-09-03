<div class="border-r-[1px] h-[100vh] w-[250px] p-[20px]">
    <div class="flex flex-row justify-between items-center mb-[10px]">
        <h3>Projects</h3>
        <a href="create" class="border-[1px] rounded bg-[#dfdfdf] px-[5px] py-[3px] no-underline">+ Create</a>
    </div>

    <div id="project-list">

    </div>
    <div id="see-more"
        class="mt-[10px] text-center text-[#555] hover:cursor-pointer hover:text-[#000] bg-[#6867670d] p-[3px] rounded hidden">
        <p>See more</p>
    </div>
</div>



<script>
    //Fetch projects via AJAX
    $(document).ready(function() {
        $.ajax({
            url: '/',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var projectList = $('#project-list');
                projectList.empty(); // Clear existing list

                if (data.length === 0) {
                    projectList.append('<p>No projects found.</p>');
                } else {
                    data?.data.forEach(function(project) {
                        var projectItem = `
                            <a href="/projects/${project.id}" class="flex flex-row items-center mb-[10px] hover:bg-[#e1e1e1] p-[5px] rounded hover:cursor-pointer no-underline text-[#000] ${window.location.pathname === '/projects/' + project.id ? 'bg-[#e1e1e1]' : ''}">
                                <div class="w-[17px] h-[17px] inline-block mr-[10px] bg-[#ff9a9a] rounded-[50%]"></div>
                                <p class="italic">${project.name}</p>
                            </a>`;

                        if (window.location.pathname === '/projects/' + project.id)
                            projectList.prepend(projectItem);
                        else
                            projectList.append(projectItem);

                    });

                    loadMoreProjects(data, projectList);
                }
            },

            error: function(xhr, status, error) {
                console.error('Error fetching projects:', error);
            }

        });
    });

    function loadMoreProjects(data, projectList) {
        if (data.next_page_url) {
            console.log(data);
            //Fetch more projects if available by pagination
            $('#see-more').removeClass('hidden');

            $("#see-more").on('click', function() {

                $.ajax({
                    url: data.next_page_url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(moreData) {
                        console.log(moreData);
                        moreData?.data.forEach(function(project) {
                            var projectItem = `
                                            <a href="/projects/${project.id}" class="flex flex-row items-center mb-[10px] hover:bg-[#e1e1e1] p-[5px] rounded hover:cursor-pointer no-underline text-[#000] ${window.location.pathname === '/projects/' + project.id ? 'bg-[#e1e1e1]' : ''}">
                                                <div class="w-[17px] h-[17px] inline-block mr-[10px] bg-[#ff9a9a] rounded-[50%]"></div>
                                                <p class="italic">${project.name}</p>
                                            </a>`;
                            if (window.location.pathname === '/projects/' + project.id)
                                projectList.prepend(projectItem);
                            else
                                projectList.append(projectItem);

                        })
                        data = moreData; // Update data to the newly fetched data
                        loadMoreProjects(
                            data); // Check if there are more pages to load if any fetch again
                    }
                });
            });
        } else {
            // No more pages so hide the button
            $('#see-more').addClass('hidden');
        }

    }
</script>
