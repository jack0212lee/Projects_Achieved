/* JACK LEE A19EC0057*/
/* SIAH WENG TZE A19EC0161*/
/* 23 January 2020 */
#include <iostream>
#include <fstream>
#include <string>
#include <iomanip>
#include <cstdlib>

using namespace std ;


//***************************************************************************************************************************************************
//                                                          Visitor Node
//
//***************************************************************************************************************************************************
class visitor_Node
{
    private :
        string name ;
        int age;  
        string ic ;
        string ticket_type ; //Children/Adult/OKU 
        string date ; // using DDMMYY format (171220)
        float time ; // using 24hours format ( 00.00 , 01.30 ,13.30) 
        
    public :
        void setname (string n){name  = n ;}
        void setage (int a){age = a ;}
        void setIc (string i){ic = i ;}
        void setTicket (string t){ticket_type = t ;}
        void setdate (string d){date = d ; }
        void setTime (float t){time = t; }
        visitor_Node* next ;

        string getName (){return name ;}
        int getAge (){return age ;}
        string getIc (){return ic ;}
        string getTicket (){return ticket_type ;}
        string getDate (){return date ;}
        float getTime (){return time ;}

        void display_info (int index)
        {
                cout << "[" << index << left << setw(3)<< "]" ;
                cout << right << setw(9) ;
                cout << name ;
                cout << setw(11) ;
                cout << age ;
                cout << setw(20) ;
                cout << ic ;
                cout << setw(16) ;
                cout << ticket_type ;
                cout << setw(21) ;
                cout << date ;
                cout << setw(10) ;
                cout << fixed << setprecision (2) ;
                cout << time ;
                cout << fixed << setprecision (0) ;
                cout << endl ;
        }
};

//***************************************************************************************************************************************************
//                                                                  Class declaration of Queue List
//
//***************************************************************************************************************************************************

class Queue_List
{
    private :
        visitor_Node* head ;
        visitor_Node* end ;
    
    public :

        void createQueue(){head = NULL ; end = NULL ;} 
        void destroyQueue() // Delete the queue at the end of the program
        {
            visitor_Node * temp = head ;
            while (temp)
            {
                head = temp->next ;
                delete temp ;
                temp = head ;
            }
        }

        int counter = 0 ;
        bool IsEmpty (){return ((head == NULL) && (end == NULL));} // return true if head is NULL (means the list is empty)

        visitor_Node * getHead (){return head ;}
        visitor_Node * getEnd () {return end ;}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                          //
//                      Insert function                                     //
//                                                                          //
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        void InsertNode (visitor_Node n)
        {
			
			visitor_Node* newNode = new visitor_Node;
			newNode->setage(n.getAge());
        	newNode->setdate(n.getDate());
        	newNode->setIc(n.getIc());
        	newNode->setname(n.getName());
        	newNode->setTicket(n.getTicket());
        	newNode->setTime(n.getTime());
        	
        	if (IsEmpty())
        	{
        		newNode->next= head;
        		head = newNode;
                end = newNode ;
			}
			
			else
			{
				newNode->next= NULL ;
				end ->next = newNode ;
                end = newNode ;
			}
    	}


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                          //
//                      Delete function                                     //
//                                                                          //
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        void deleteNode () 
        {
            visitor_Node* temp ;
            temp = head ;
            head = head ->next ;
            temp ->next = NULL ;
            delete temp ;

            if (!head)
            {
                end = NULL ;
            }
        }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                          //
//                      Finding function                                    //
//                                                                          //
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        void FindName (string n, int found_index[], int count, int &found) // <- Store the index of the same name into array
        {                                                                   // <- found : to count the number of object wiht same
                                                                            //            name found in the list
           visitor_Node * currNode = head ;
            int currIndex = 1;
            int c = 0 ;
            
            while (currNode) 
            {
                if (currNode->getName() == n)
            {
                found_index[c] = currIndex - 1 ;
                c++ ;
                found = c ;
            }
                currNode = currNode->next;
                currIndex++;
                
            }
        }

        void FindAge (int a, int found_index[], int count, int &found) // Find the object with the same age and store into temporary array
        {                                                              // found : to count the number of object found
           visitor_Node * currNode = head ;
            int currIndex = 1;
            int c = 0 ;
            
            while (currNode) 
            {
                if (currNode->getAge() == a)
            {
                found_index[c] = currIndex - 1 ;
                c++ ;
                found = c ;
            }
                currNode = currNode->next;
                currIndex++;
            }
        }
        
        void FindIc (string ic, int found_index[], int count, int &found) // Find the object with the same IC number
        {                                                                 // found : to count the number of object found
            visitor_Node * currNode = head ;
            int currIndex = 1;
            int c = 0 ;
            
            while (currNode) 
            {
                if (currNode->getIc() == ic)
            {
                found_index[c] = currIndex - 1 ;
                c++ ;
                found = c ;
            }
                currNode = currNode->next;
                currIndex++;
            }
        }

       void FindTicket (string ticket, int found_index[], int count, int &found) // FInd the object with the same ticket type
        {                                                                       // found : to count the number of object found
            visitor_Node * currNode = head ;
            int currIndex = 1;
            int c = 0 ;
            
            while (currNode) 
            {
                if (currNode->getTicket() == ticket)
            {
                found_index[c] = currIndex - 1 ;
                c++ ;
                found = c ;
            }
                currNode = currNode->next;
                currIndex++;
            }
        }

       void FindDate (string date, int found_index[], int count, int &found) // Find the object with the same date
        {                                                                   // found : to count the number of object found
            visitor_Node * currNode = head ;
            int currIndex = 1;
            int c = 0 ;
            
            while (currNode) 
            {
                if (currNode->getDate () == date)
            {
                found_index[c] = currIndex - 1 ;
                c++ ;
                found = c ;
            }
                currNode = currNode->next;
                currIndex++;
            }
        }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                          //
//                      Display function                                    //
//                                                                          //
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        void displayList ()
        {
            visitor_Node * temp ;
            temp = head ;
            int c = 0 ;
            cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time" ;
            while (temp && c < counter)
            {
                
                cout << "\n\n" ;
                cout << "[" << c << left << setw(3)<< "]" ;
                cout << right << setw(9) ;
                cout << temp->getName() ;
                cout << setw(11) ;
                cout << temp->getAge () ;
                cout << setw(20) ;
                cout << temp->getIc() ;
                cout << setw(16) ;
                cout << temp ->getTicket () ;
                cout << setw(21) ;
                cout << temp->getDate () ;
                cout << setw(10) ;
                cout << fixed << setprecision (2) ;
                cout << temp->getTime() ;
                cout << fixed << setprecision (0) ;

                temp = temp->next ;
                c ++ ;
            }
            cout << endl << endl ;
        }

        void setHead (visitor_Node *h)
        {
            head = h ;
        }
}; // end class declaration 

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                          //
//                      Sorting function                                    //
//                                                                          //
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

visitor_Node * swap (visitor_Node* node1 , visitor_Node* node2)
{
            visitor_Node * temp = node2->next ;
            node2 -> next = node1 ;
            node1 -> next = temp ;
            return node2 ;
}

visitor_Node * sort_date (visitor_Node ** head, int counter) // <== Sort by date
{
    visitor_Node * ptr1 ;
    visitor_Node * ptr2 ;
    visitor_Node ** h ; // using double pointer to prevent changes to the head pointer in List
    string str1, str2 ;
    int cmp1, cmp2, index;
    int iteration ;
    bool sorted = false ; 
    int c = counter ;
    for (iteration = 1 ; (iteration < c) && !sorted ; iteration ++ ) 
    {
        sorted = true ;
        h = head ;      
        for (index = 0 ; index < (c - iteration) ; index ++)
        {
            ptr1 = *h ;
            ptr2 = ptr1 ->next ;
            str1 = ptr1->getDate().substr(0,2); // Arranged by date first
            str2 = ptr2->getDate().substr(0,2);
            cmp1 = stoi(str1) ;
            cmp2 = stoi (str2) ;

            if (cmp1 > cmp2)
            {
                *h = swap(ptr1,ptr2) ;
                sorted = false ;
            }
            h = &(*h)->next; // address of the next pointer of h 
        }  
    }
    h = head ;
    sorted = false ;

    for (iteration = 1 ; (iteration < c) && !sorted ; iteration ++ )
    {
        sorted = true ;
        h = head ;      
        for (index = 0 ; index < (c - iteration) ; index ++)
        {
            ptr1 = *h ;
            ptr2 = ptr1 ->next ;
            str1 = ptr1->getDate().substr(3,2); // Arrange by month 
            str2 = ptr2->getDate().substr(3,2);
            cmp1 = stoi(str1) ;
            cmp2 = stoi (str2) ;

            if (cmp1 > cmp2)
            {
                *h = swap(ptr1,ptr2) ;
                sorted = false ;
            }
            h = &(*h)->next;
        }  
    }
    h = head ;
    sorted = false ;

    for (iteration = 1 ; (iteration < c) && !sorted ; iteration ++ )
    {
        sorted = true ;
        h = head ;      
        for (index = 0 ; index < (c - iteration) ; index ++)
        {
            ptr1 = *h ;
            ptr2 = ptr1 ->next ;
            str1 = ptr1->getDate().substr(6,4); // Arrange by year
            str2 = ptr2->getDate().substr(6,4);
            cmp1 = stoi(str1) ;
            cmp2 = stoi (str2) ;


            if (cmp1 > cmp2)
            {
                *h = swap(ptr1,ptr2) ;
                sorted = false ;
            }
            h = &(*h)->next;
        }  
    }
    h = head ;

    return *h ;
}

visitor_Node * sort_time (visitor_Node ** head, int counter) // <== Sort by time
{
    visitor_Node * ptr1 ;
    visitor_Node * ptr2 ;
    visitor_Node ** h ;
    float t1, t2 ;
    int index;
    int iteration ;
    bool sorted = false ; 
    int c = counter ;

    for (iteration = 1 ; (iteration < c) && !sorted ; iteration ++ )
    {
        sorted = true ;
        h = head ;      
        for (index = 0 ; index < (c - iteration) ; index ++)
        {
            ptr1 = *h ;
            ptr2 = ptr1 ->next ;
            t1 = ptr1->getTime() ;
            t2 = ptr2->getTime() ;
        
            if (t1 > t2)
            {
                *h = swap(ptr1,ptr2) ;
                sorted = false ;
            }
            h = &(*h)->next;
        }  
    }
    h = head ;

    return *h ;
}

visitor_Node * sort_ticket (visitor_Node ** head, int counter) // <== Sort by ticket type
{
    visitor_Node * ptr1 ;
    visitor_Node * ptr2 ;
    visitor_Node ** h ;
    string t1, t2 ;
    int index;
    int iteration ;
    bool sorted = false ; 
    int c = counter ;

    for (iteration = 1 ; (iteration < c) && !sorted ; iteration ++ )
    {
        sorted = true ;
        h = head ;      
        for (index = 0 ; index < (c - iteration) ; index ++)
        {
            ptr1 = *h ;
            ptr2 = ptr1 ->next ;
            t1 = ptr1->getTicket() ;
            t2 = ptr2->getTicket();
        
            if (t1 < t2)
            {
                *h = swap(ptr1,ptr2) ;
                sorted = false ;
            }
            h = &(*h)->next;
        }  
    }
    h = head ;

    return *h ;
}



//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>><<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//                                                                                                                                                                               //
//                                                                         Main function                                                                                         //
//                                                                                                                                                                               // 
//                                                                                                                                                                               //
//<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

int main ()
{
    int main_choice, subchoice, index;
    bool cont_run, invalid_choice, end_func, cont_func;
    visitor_Node temp ;
    visitor_Node * search_result ;
    visitor_Node *temphead ;
    string name, ic, date, ticket, sname,sic,sdate,sticket ;
    int age, sage ;
    int found_index[10] ;
    int found_count ;
    float time ;
    Queue_List l ;
    ofstream out ;
    l.createQueue() ;
    // -----------  File operation ------------------ //
    ifstream in ;
	in.open("Visitor_list.txt") ;
	if(!in)
	{
		cout << "Fail to open visitor list file ! \n" ;
		return 0 ;
	}

///// --------- Reading items from the file --------------- //

    while (!in.eof())
    {
        in >> name ;
        if (name == "")
        {
            break ;
        }
        in >> age ;
        in >> ic ;
        in >> ticket ;
        in >> date ;
        in >> time ;

        temp.setname (name);
        temp.setage (age);
        temp.setIc (ic) ;
        temp.setTicket (ticket) ;
        temp.setdate (date);
        temp.setTime (time) ;

        l.InsertNode(temp) ;
        l.counter ++ ;
    }

    in.close() ;
// ==========================================================================================
//
// ----------------------------------------  Main menu ----------------------------------- //   
//
//============================================================================================  
    do{
        cont_run = true ;
        do{
            system ("CLS") ;
            cout << "\n\n<< Zoo Visitors >> \n\n" ;
            cout << "[1] Insert visitor \n" ;
            cout << "[2] Delete visitor \n" ;
            cout << "[3] Find visitor \n" ;
            cout << "[4] Sort visitor \n" ;
            cout << "[5] Display all visitor \n" ;
            cout << "[6] Display first visitor \n" ;
            cout << "[7] Display last visitor \n" ; 
            cout << "[8] Save changes \n" ;
            cout << "\n[0] Exit" ;

            cout << "\n\nYour choice : " ;

            cin >> main_choice ;

            try{
                // ------ If user enters non digit value or negative value or value greater than 8 ----- //
                if ( !(cin) || cin.fail() || main_choice < 0 || main_choice > 8)
                {
					// clear input buffer
                    cin.clear() ;
                    cin.ignore() ;
                    string invalid = "\nInvalid input ! \n" ;
                    throw invalid ;
                }
                else
                {
					// if user enters valid input 
                    invalid_choice = false ;
                }
            }
            catch (string msg)
            {
                cout << msg ;
				system ("PAUSE") ;
            }
    }
    while (invalid_choice);

        switch (main_choice)
        {
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                INSERT VISITORS TO THE BACK OF THE QUEUE
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            case 1 :

                        do{
                            system ("CLS") ;
                            invalid_choice = false ;                    
                            cout << "<< Insert Visitor Into Queue>> \n\n" ;

                            l.displayList () ;
                            cout << endl << endl ;
                            index = 0 ;
                            cout << "\n ** Enter visitor details to be inserted ** \n\n" ;
                            cout << "Name : " ;
                            cin >> name ;
                            if (!cin)// <---------------------------------Checking validity of input
                            {cin.clear() ; invalid_choice = true ;}

                            cout << "Age : " ;
                            cin >> age ;
                            if (!cin)
                            {cin.clear() ; invalid_choice = true ;}

                            cout << "IC (xxxxxxxxx-xx-xxxx): " ;
                            cin >> ic ;
                            if (!cin)
                            {cin.clear() ; invalid_choice = true ;}

                            cout << "Ticket type (Adult, Child, OKU): " ;
                            cin >> ticket ;
                            if (!cin)
                            {cin.clear() ; invalid_choice = true ;}

                            cout << "Date (dd/mm/yyyy) : " ;
                            cin >> date ; 
                            if (!cin)
                            {cin.clear() ; invalid_choice = true ;}

                            cout << "Time (hh.mm ): " ;
                            cin >> time ;
                            float timecheck ;
                            if (time-24 == 0)// <--------------------Checking validity of the time
                            {
                                timecheck = time - 24 ;
                            }
                            else if (time-24 > 0)
                            {
                                invalid_choice = true ;
                            }
                            else if (time -24 < 0 )
                            {
                                timecheck = 24 - time ;
                            }
                            if (timecheck > 60 || timecheck < 0)
                            {invalid_choice == true ;}

                            temp.setname(name) ;
                            temp.setage(age) ;
                            temp.setIc(ic) ;
                            temp.setTicket(ticket) ;
                            temp.setdate(date) ;
                            temp.setTime(time) ; 

                            if (invalid_choice)
                            {
                                cout << "\nInvalid input detected !\n" ;
                                system ("PAUSE") ;
                            }
                            else
                            {
                                l.InsertNode(temp) ;
                                l.counter ++ ;
                            }
                            

                        }while (invalid_choice) ;
                break ;


            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                           DELETE VISITORS FROM THE FRONT OF THE QUEUE
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            
            case 2 :
                system ("CLS") ; 
                if (l.IsEmpty()) // <------------ Check if the list is empty
                {
                    cout << "Nothing exists in the list to be deleted \n\n ";
                    system ("PAUSE") ;
                }
                else // <---------------------------- If not, proceed to run the function
                {
                    do{
                        system ("CLS") ;
                        cont_func = true ;
                        do{
                            system ("CLS") ;
                            invalid_choice = true ;
                            l.displayList () ;
                            cout << "<< Delete Visitors >> \n\n" ;
                            cout << "Deletion will start from the earliest visitor, continue ? \n\n" ;
                            cout << "[1] Yes \n" ;
                            cout << "[2] No \n\n" ;
                            cout << "Your choice : " ;

                            cin >> subchoice ;
                            try{
                                    // ------ If user enters non digit value or negative value or value greater than 2 ----- //
                                    if ( !(cin) || cin.fail() || subchoice < 1 || subchoice > 2)
                                    {
                                        // clear input buffer
                                        cin.clear() ;
                                        cin.ignore() ;
                                        string invalid = "\nInvalid input ! \n" ;
                                        throw invalid ;
                                    }
                                    else
                                    {
                                        // if user enters valid input 
                                        invalid_choice = false ;
                                    }
                                }
                                catch (string msg)
                                {
                                    cout << msg ;
                                    system ("PAUSE") ;
                                }
                            } while (invalid_choice) ;

                            switch (subchoice)
                            {
                                case 1 : // <----------------- Delete visitors from front
                                    cout << "\n<< First visitor deleted >> \n\n" ;
                                    l.deleteNode () ;
                                    l.counter -- ;
                                    system ("CLS") ;
                                    l.displayList() ;
                                    system ("PAUSE") ;
                                    if (l.counter == 0)
                                    {cont_func = false ;} // <--- End the delete function when there is nothing more to be deleted
                                    break ;
                                case 2 : // <---------------- Exit the delete function
                                    cont_func = false ;
                                    break ;
                                default :
                                    break ;
                            }
                        }
                        while (cont_func) ;
                }
                break ;

            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                      FIND VISITORS
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            case 3 :
            if (l.IsEmpty())
            {
                cout << "The list is empty. \n\n" ;
                system ("PAUSE") ;
            }
            else{
                cont_func = true ;
                do{
                    do{
                        invalid_choice = true ;
                        system ("CLS") ;

                        cout << "<< Find visitor >> \n\n" ;
                        cout << "Search by : \n\n" ;
                        cout << "[1] Name  " ;
                        cout << "\n[2] Age" ;
                        cout << "\n[3] IC" ;
                        cout << "\n[4] Ticket (OKU, Child, Adult)" ;
                        cout << "\n[5] Date\n\n" ;
                        cout << "[0] Return \n\n" ;
                        cout << "Your choice : " ;

                        cin >> subchoice ;

                        try{
                                // ------ If user enters non digit value or negative value or value greater than 2 ----- //
                                if ( !(cin) || cin.fail() || subchoice < 0 || subchoice > 5)
                                {
                                    // clear input buffer
                                    cin.clear() ;
                                    cin.ignore() ;
                                    string invalid = "\nInvalid input ! \n" ;
                                    throw invalid ;
                                }
                                else
                                {
                                    // if user enters valid input 
                                    invalid_choice = false ;
                                }
                            }
                            catch (string msg)
                            {
                                cout << msg ;
                                system ("PAUSE") ;
                            }
                        } while (invalid_choice) ;

                        switch (subchoice)
                        {
                            case 1 :
                                // ---------Search by name ------------- //
                                cout << "<< Search by Name >> \n\n" ; 
                                cout << "Name : " ;
                                cin >> sname ;
                                found_count = 0 ;
                                l.FindName (sname, found_index, l.counter, found_count) ;

                                cout << "Search result : \n\n" ;
                                                        
                                if (found_count == 0)
                                {
                                    cout << "Visitor not found. \n\n" ;
                                    system ("PAUSE") ;
                                    break ;
                                }
                                else
                                {
                                    cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time\n\n" ;

                                    for (int i = 0 ; i < found_count ; i ++)
                                    {
                                        search_result = l.getHead() ;
                                        for (int k = 0 ; k < found_index[i] ; k ++)
                                        {
                                            search_result = search_result->next ;
                                        }
                                        search_result->display_info(found_index[i]) ;
                                    }
                                }
                                system("PAUSE") ;
                                break ;
                            case 2 :
                                // ---------Search by Age ------------- //
                                cout << "<< Search by Age >> \n\n" ;
                                cout << "Age : " ;
                                cin >> sage ;
                                found_count = 0 ;
                                l.FindAge (sage, found_index, l.counter, found_count) ;

                                cout << "Search result : \n\n" ;
                                
                                
                                if (found_count == 0)
                                {
                                    cout << "Item not found. \n\n" ;
                                    system ("PAUSE") ;
                                    break ;
                                }
                                else
                                {
                                    cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time\n\n" ;
                                    for (int i = 0 ; i < found_count ; i ++)
                                    {
                                        search_result = l.getHead() ;
                                        for (int k = 0 ; k < found_index[i] ; k ++)
                                        {
                                            search_result = search_result->next ;
                                        }
                                        search_result->display_info(found_index[i]) ;
                                    }
                                system("PAUSE") ;
                                }

                                break ;
                            case 3 :
                                // ---------Search by IC ------------- //
                                cout << "<< Search by IC >> \n\n" ;
                                cout << "IC (With -) : " ;
                                cin >> sic ;
                                found_count = 0 ;
                                l.FindIc (sic, found_index, l.counter, found_count) ;

                                cout << "Search result : \n\n" ;
                                
                                
                                if (found_count == 0)
                                {
                                    cout << "Item not found. \n\n" ;
                                    system ("PAUSE") ;
                                    break ;
                                }
                                else
                                {
                                    cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time\n\n" ;
                                    for (int i = 0 ; i < found_count ; i ++)
                                    {
                                        search_result = l.getHead() ;
                                        for (int k = 0 ; k < found_index[i] ; k ++)
                                        {
                                            search_result = search_result->next ;
                                        }
                                        search_result->display_info(found_index[i]) ;
                                    }
                                system("PAUSE") ;
                                }
                                break ;
                            case 4 :
                                // ---------Search by Ticket ------------- //
                                cout << "<< Search by Ticket >> \n\n" ;
                                cout << "Ticket type (Child, Adult, OKU): " ;
                                cin >> sticket ;
                                found_count = 0 ;
                                l.FindTicket (sticket, found_index, l.counter, found_count) ;

                                cout << "Search result : \n\n" ;
                                
                            
                                if (found_count == 0)
                                {
                                    cout << "Item not found. \n\n" ;
                                    system ("PAUSE") ;
                                    break ;
                                }
                                else
                                {
                                    cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time\n\n" ;
                                    for (int i = 0 ; i < found_count ; i ++)
                                    {
                                        search_result = l.getHead() ;
                                        for (int k = 0 ; k < found_index[i] ; k ++)
                                        {
                                            search_result = search_result->next ;
                                        }
                                        search_result->display_info(found_index[i]) ;
                                    }
                                system("PAUSE") ;
                                }
                                break ;
                            case 5 :
                                // ---------Search by date ------------- //
                                cout << "<< Search by Date >> \n\n" ;
                                cout << "Date (DD/MM/YYYY) : " ;
                                cin >> sdate ;
                                found_count = 0 ;
                                l.FindDate (sdate, found_index, l.counter, found_count) ;

                                cout << "Search result : \n\n" ;
                                
                                
                                if (found_count == 0)
                                {
                                    cout << "Item not found. \n\n" ;
                                    system ("PAUSE") ;
                                    break ;
                                }
                                else
                                {
                                    cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time\n\n" ;
                                    for (int i = 0 ; i < found_count ; i ++)
                                    {
                                        search_result = l.getHead() ;
                                        for (int k = 0 ; k < found_index[i] ; k ++)
                                        {
                                            search_result = search_result->next ;
                                        }
                                        search_result->display_info(found_index[i]) ;
                                    }
                                system("PAUSE") ;
                                }
                                break ;                        

                            default :
                                cont_func = false ; // <----- End this function
                                break ;
                        }
                    }while(cont_func); // <----- Continue to run the function
                }
                break ; 
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                      SORT VISITORS
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            case 4 :
                    if (l.IsEmpty())
                    {
                        cout << "The list is empty. \n\n" ;
                        system ("PAUSE") ;
                    }
                    else{
                    cont_func = true ;
                    do{
                        do{
                            system("CLS") ;
                            l.displayList() ;
                            invalid_choice = true ;
                        cout << "<< Sort Visitor >> \n\n" ;
                        cout << "[1] Sort by Ticket Type\n" ;
                        cout << "[2] Sort by Date\n" ;
                    
                        cout << "\n[0] Return to main menu \n\n";

                        cout << "Your choice : " ;
                        cin >> subchoice ;
                        try{
                            // ------ If user enters non digit value or negative value or value greater than 2 ----- //
                            if ( !(cin) || cin.fail() || subchoice < 0 || subchoice > 2)
                            {
                                // clear input buffer
                                cin.clear() ;
                                cin.ignore() ;
                                string invalid = "\nInvalid input ! \n" ;
                                throw invalid ;
                            }
                            else
                            {
                                // if user enters valid input 
                                invalid_choice = false ;
                            }
                        }
                        catch (string msg)
                        {
                            cout << msg ;
                            system ("PAUSE") ;
                        }

                        } while (invalid_choice) ;

                    switch (subchoice)
                    {
                        case 1 :
                            // <<<<<<   SORT BY TICKET >>>>>>                        
                            system ("CLS") ;
                            cout << "<<< Sort by Ticket >>> \n\n" ;
                            temphead = l.getHead() ; // <------ Assign the head of list into a variable
                            l.setHead(sort_ticket (&temphead , l.counter) ) ; // <----- Pass the address of the head pointer to the function
                            // <---------- Set the new head of the list (sorted list) 
                            l.displayList() ;
                            system("PAUSE");
                            break ;
                        case 2 :
                            // <<<<<<   SORT BY DATE  >>>>>>    
                            system ("CLS") ;
                            cout << "<<< Sort by Date >>> \n\n" ;
                            temphead = l.getHead() ;
                            l.setHead(sort_time (&temphead , l.counter) ) ; // <--- Sorting time first to get the all the time in the same date together
                            temphead = l.getHead() ; // <------ Assign the head of list into a variable
                            l.setHead(sort_date(&temphead, l.counter)) ;
                            // <---------- Set the new head of the list (sorted list)
                            l.displayList() ;
                            system("PAUSE");
                            break ;
                        default :
                            cont_func = false ;// <------ End function 
                            break ;
                        }
                    }while(cont_func);
                }
                break ;
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                      DISPLAY VISITORS
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            case 5 :
                system ("CLS") ;            
                l.displayList() ;
                system ("PAUSE") ;
                break;
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                      DISPLAY FIRST VISITORS
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}

            case 6 :
                system("CLS") ;
                cout << "<<  First visitor in the list >> \n\n" ;
                cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time" ;
                cout << "\n\n" ;
                cout << "[" << 0 << left << setw(3)<< "]" ;
                cout << right << setw(9) ;
                cout << l.getHead()->getName() ;
                cout << setw(11) ;
                cout << l.getHead()->getAge () ;
                cout << setw(20) ;
                cout << l.getHead()->getIc() ;
                cout << setw(16) ;
                cout << l.getHead()->getTicket () ;
                cout << setw(21) ;
                cout << l.getHead()->getDate () ;
                cout << setw(10) ;
                cout << fixed << setprecision (2) ;
                cout << l.getHead()->getTime() ;
                cout << endl << endl ;
                cout << fixed << setprecision (0) ;

                system("PAUSE") ;

                break; 

            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                                      DISPLAY LAST VISITORS
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            
            case 7 :
                system("CLS") ;
                cout << "<<  Last visitor in the list >> \n\n" ;
                cout << "Index     Name        Age            IC                Ticket     Date(DD/MM/YYYY)      Time" ;
                cout << "\n\n" ;
                cout << "[" << l.counter-1 << left << setw(3)<< "]" ;
                cout << right << setw(9) ;
                cout << l.getEnd()->getName() ;
                cout << setw(11) ;
                cout << l.getEnd()->getAge () ;
                cout << setw(20) ;
                cout << l.getEnd()->getIc() ;
                cout << setw(16) ;
                cout << l.getEnd()->getTicket () ;
                cout << setw(21) ;
                cout << l.getEnd()->getDate () ;
                cout << setw(10) ;
                cout << fixed << setprecision (2) ;
                cout << l.getEnd()->getTime() ;
                cout << endl << endl ;
                cout << fixed << setprecision (0) ;

                system("PAUSE") ;

                break; 

            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            //
            //                             SAVE THE CHANGES DONE IN THE PROGRAM
            //
            //{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
            case 8 :
                    out.open("Visitor_list.txt") ;

                    temphead = l.getHead () ;

                    for (int i = 0 ; i < l.counter ; i ++)
                    {
                                out << left ;
                                out << setw(12) ;
                                out << temphead->getName() ;
                                out << right ;
                                out << setw(3) ;
                                out << temphead->getAge () ;
                                out << setw(20) ;
                                out << temphead->getIc() ;
                                out << setw(16) ;
                                out << temphead ->getTicket () ;
                                out << setw(21) ;
                                out << temphead->getDate () ;
                                out << setw(10) ;
                                out << fixed << setprecision (2) ;
                                out << temphead->getTime() ;
                                out << fixed << setprecision (0) ;
                                out << "\n" ;

                                temphead = temphead->next ;
                    }
                    out.close() ;
                    break ;                
            case 0:
                cont_run = false ;
                break ;
            default :
                break ;
        }
    }while (cont_run) ; 

    l.destroyQueue() ;
}
