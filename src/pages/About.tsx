
import React from "react";
import { Card } from "@/components/ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Users2, MapPin, Building } from "lucide-react";

const teamMembers = [
  {
    name: "Sarah Johnson",
    role: "CEO & Founder",
    image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
    bio: "Sarah founded GreenGrowth with a vision to make financial education accessible to everyone. With over 15 years of experience in fintech and financial consulting, she leads our team with passion and innovation."
  },
  {
    name: "David Chen",
    role: "Lead Developer",
    image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
    bio: "David is a full-stack developer with expertise in financial systems and data visualization. He's passionate about creating intuitive user experiences and powerful financial tools."
  },
  {
    name: "Maria Rodriguez",
    role: "Financial Advisor",
    image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=688&q=80",
    bio: "Maria has 10+ years of experience in personal finance consulting. She helps shape our calculator features to ensure they provide the most value to users in managing their finances."
  },
  {
    name: "James Wilson",
    role: "Marketing Director",
    image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80",
    bio: "James leads our marketing initiatives with creativity and data-driven strategies. With a background in both finance and digital marketing, he helps bring financial literacy to more people."
  }
];

const About = () => {
  return (
    <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div className="max-w-4xl mx-auto">
        <h1 className="text-4xl font-bold mb-8">About GreenGrowth</h1>
        
        <Tabs defaultValue="company" className="w-full">
          <TabsList className="grid grid-cols-3 mb-8">
            <TabsTrigger value="company" className="flex items-center justify-center gap-2">
              <Building className="h-4 w-4" />
              <span>About</span>
            </TabsTrigger>
            <TabsTrigger value="team" className="flex items-center justify-center gap-2">
              <Users2 className="h-4 w-4" />
              <span>Team</span>
            </TabsTrigger>
            <TabsTrigger value="location" className="flex items-center justify-center gap-2">
              <MapPin className="h-4 w-4" />
              <span>Location</span>
            </TabsTrigger>
          </TabsList>
          
          {/* Company Tab */}
          <TabsContent value="company" className="animate-fade-in">
            <Card className="p-6 md:p-10">
              <div className="prose prose-green max-w-none">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                <p className="text-gray-700 mb-6">
                  At GreenGrowth, we believe that financial literacy should be accessible to everyone. Our mission is to empower individuals with the knowledge and tools they need to make informed financial decisions and build a secure future.
                </p>
                
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Our Story</h2>
                <p className="text-gray-700 mb-6">
                  Founded in 2023, GreenGrowth began as a graduation project with a simple idea: create an intuitive financial calculator that anyone could use to manage their finances better. What started as a project soon evolved into a comprehensive platform for financial education and management.
                </p>
                <p className="text-gray-700 mb-6">
                  Our team of finance experts and developers work together to create tools that simplify complex financial concepts and make money management straightforward for everyone, regardless of their financial background.
                </p>
                
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Our Values</h2>
                <ul className="list-disc pl-6 space-y-2 text-gray-700 mb-6">
                  <li><span className="font-semibold text-green-600">Transparency:</span> We believe in being open and honest in all our operations.</li>
                  <li><span className="font-semibold text-green-600">Accessibility:</span> Financial education should be available to everyone, regardless of their background.</li>
                  <li><span className="font-semibold text-green-600">Innovation:</span> We continuously improve our tools to provide the best financial management experience.</li>
                  <li><span className="font-semibold text-green-600">Security:</span> We prioritize the security of your financial data above everything else.</li>
                </ul>
                
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Our Goals</h2>
                <p className="text-gray-700">
                  Our ultimate goal is to bridge the financial literacy gap by providing accessible, easy-to-use tools that empower individuals to take control of their financial future. We envision a world where everyone has the knowledge and resources to make smart financial decisions and achieve financial wellness.
                </p>
              </div>
            </Card>
          </TabsContent>
          
          {/* Team Tab */}
          <TabsContent value="team" className="animate-fade-in">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              {teamMembers.map((member, index) => (
                <Card key={index} className="overflow-hidden card-hover">
                  <div className="flex flex-col md:flex-row">
                    <div className="w-full md:w-1/3">
                      <img 
                        src={member.image} 
                        alt={member.name}
                        className="w-full h-60 md:h-full object-cover"
                      />
                    </div>
                    <div className="p-6 w-full md:w-2/3">
                      <h3 className="font-bold text-xl mb-1">{member.name}</h3>
                      <p className="text-green-600 mb-3">{member.role}</p>
                      <p className="text-gray-600 text-sm">{member.bio}</p>
                    </div>
                  </div>
                </Card>
              ))}
            </div>
          </TabsContent>
          
          {/* Location Tab */}
          <TabsContent value="location" className="animate-fade-in">
            <Card className="p-6">
              <div className="space-y-6">
                <div>
                  <h2 className="text-2xl font-bold text-gray-900 mb-3">Our Office</h2>
                  <p className="text-gray-700 mb-1">123 Financial District</p>
                  <p className="text-gray-700 mb-1">Suite 456</p>
                  <p className="text-gray-700 mb-1">New York, NY 10001</p>
                  <p className="text-gray-700 mb-1">United States</p>
                  <p className="text-gray-700 mb-4">
                    <span className="font-medium">Email:</span> contact@greengrowth.com
                  </p>
                </div>
                
                <div className="rounded-lg overflow-hidden border border-gray-200 h-96">
                  <iframe
                    title="GreenGrowth Office Location"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00194265026278!3d40.71390827932998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a18c8d0aef9%3A0xe3146b30201c5361!2sWall%20Street%2C%20New%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sca!4v1684363150530!5m2!1sen!2sca"
                    width="100%"
                    height="100%"
                    style={{ border: 0 }}
                    allowFullScreen={true}
                    loading="lazy"
                    referrerPolicy="no-referrer-when-downgrade"
                  ></iframe>
                </div>
                
                <div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">Office Hours</h3>
                  <div className="grid grid-cols-2 gap-2">
                    <div>
                      <p className="font-medium">Monday - Friday</p>
                      <p className="text-gray-700">9:00 AM - 5:00 PM</p>
                    </div>
                    <div>
                      <p className="font-medium">Saturday</p>
                      <p className="text-gray-700">10:00 AM - 2:00 PM</p>
                    </div>
                    <div>
                      <p className="font-medium">Sunday</p>
                      <p className="text-gray-700">Closed</p>
                    </div>
                  </div>
                </div>
              </div>
            </Card>
          </TabsContent>
        </Tabs>
      </div>
    </div>
  );
};

export default About;
